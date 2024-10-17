<?php

namespace App\Providers;

use Spatie\MediaLibrary\Support\UrlGenerator\BaseUrlGenerator;
use Throwable;

class TenantUrlGenerator extends BaseUrlGenerator
{
    public function getUrl(): string
    {
        $url = $this->getDisk()->url($this->getPathRelativeToRoot());
        $tenant = tenant();

        if ($tenant && config(('filament.default_filesystem_disk')) === 'public') {
            $sufixBase = config('tenancy.filesystem.suffix_base');
            $tenantPath = "$sufixBase{$tenant->id}/app/public/{$this->getPathRelativeToRoot()}";
            $url = $this->getDisk()->url($tenantPath);
        } elseif (config(('filament.default_filesystem_disk')) === 's3') {
            try {
                $url = $this->getDisk()->temporaryUrl(
                    $this->getPathRelativeToRoot(),
                    now()->addMinutes(60),
                );
            } catch (Throwable $exception) {
                // This driver does not support creating temporary URLs.
            }
        }

        return $this->versionUrl($url);
    }
}
