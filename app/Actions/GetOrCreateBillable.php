<?php

namespace App\Actions;

use App\Actions\Stripe\CreateCustomer;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class GetOrCreateBillable
{
    use AsAction;

    public function handle(User $user, string $email, $name = null, array $data = [])
    {
        $data['email'] = $email;
        $data['name'] = $name;

        if ($user->billable()->exists()) {
            return $user->billable;
        }

        $customer = CreateCustomer::run($name, $email, $data);
        $data['stripe_id'] = $customer->id;

        $billable = $user->billable()->create($data);
        $user->update(['billable_id' => $billable->id]);

        return $billable;
    }
}
