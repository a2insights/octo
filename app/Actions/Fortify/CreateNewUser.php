<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Octo\Billing\Saas;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        $input['phone_number'] = @$input['calling_code'] . ' ' . @$input['phone'];

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'phone_number' => ['nullable', 'unique:users'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $tenant = $this->createTenant();

        return tap(User::forceCreate([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone_number' => $input['phone_number'],
            'password' => Hash::make($input['password']),
            'tenant_id' => $tenant->id
        ]), function (User $user) {
            $this->createTeam($user);

            if_feature_is_enabled('billing' , function () use ($user) {
                $planFree = Saas::getFreePlan();

                $subscription = $user->newSubscription($planFree->getName(), $planFree->getId());

                $meteredFeatures = $planFree->getMeteredFeatures();

                if (! $meteredFeatures->isEmpty()) {
                    foreach ($meteredFeatures as $feature) {
                        $subscription->meteredPrice($feature->getMeteredId());
                    }
                }

                $subscription = $subscription->create();

                $subscription->stripe_price = $planFree->getId();

                $subscription->save();

                $user->forceFill(['current_subscription_id' => $planFree->getId()])->save();

                $subscription->recordFeatureUsage('teams', 1);
            });

        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0] . "'s Team",
            'personal_team' => true,
        ]));
    }

    /*
    * Create a tenant for the user.
    *
    * @return \App\Models\Tenant
    */
    private function createTenant()
    {
        return Tenant::create();
    }
}
