<?php

namespace App\Models;

use A21ns1g4ts\FilamentStripe\Models\Billable;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Models\Contracts\HasDefaultTenant;
use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Octo\User\Settings;
use Spatie\Permission\Traits\HasRoles;
use TaylorNetwork\UsernameGenerator\FindSimilarUsernames;
use TaylorNetwork\UsernameGenerator\GeneratesUsernames;
use Wallo\FilamentCompanies\HasCompanies;
use Wallo\FilamentCompanies\HasConnectedAccounts;
use Wallo\FilamentCompanies\HasProfilePhoto;
use Wallo\FilamentCompanies\SetsProfilePhotoFromUrl;

class User extends Authenticatable implements BannableContract, FilamentUser, HasAvatar, HasDefaultTenant, HasTenants, MustVerifyEmail
{
    use Bannable, FindSimilarUsernames, GeneratesUsernames, HasApiTokens, HasCompanies,
        HasConnectedAccounts, HasFactory, HasProfilePhoto, HasRoles, Notifiable, SetsProfilePhotoFromUrl,
        SoftDeletes, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'billable_id',
        'name',
        'email',
        'phone',
        'username',
        'avatar_url',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'settings' => Settings::class,
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    public function canAccessTenant(Model $tenant): bool
    {
        return $this->belongsToCompany($tenant);
    }

    public function getFilamentAvatarUrl(): ?string
    {
        if ($this->avatar_url && config('filament.default_filesystem_disk') === 's3') {
            return Storage::disk('avatars')->temporaryUrl(
                $this->avatar_url,
                now()->addMinutes(60),
            );
        }

        return $this->avatar_url ? Storage::url($this->avatar_url) : null;
    }

    public function getTenants(Panel $panel): array|Collection
    {
        return $this->allCompanies();
    }

    public function getDefaultTenant(Panel $panel): ?Model
    {
        return $this->currentCompany;
    }

    public function billable(): BelongsTo
    {
        return $this->belongsTo(Billable::class);
    }
}
