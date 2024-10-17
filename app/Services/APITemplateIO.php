<?php

namespace App\Services;

use App\Contracts\PDFService;
use Illuminate\Support\Facades\Http;

class APITemplateIO implements PDFService
{
    public function generate(int|string $template, array $data): string
    {
        return $this->createPdf((string) $template, $data);
    }

    public function templates(): array
    {
        return $this->listTemplates();
    }

    public function client(): \Illuminate\Http\Client\PendingRequest
    {
        return Http::withHeaders([
            'X-API-KEY' => config('services.apitemplateio.key'),
        ])->baseUrl('https://rest-us.apitemplate.io/v2');
    }

    public function listTemplates(): array
    {
        $response = $this->client()->get('/list-templates');

        return $response->json('templates');
    }

    public function getTemplate(string $template)
    {
        $response = $this->client()->get('/get-template', [
            'template_id' => $template,
        ]);

        return $response->json();
    }

    // TODO: Implement the previewTemplate in front-end
    public function previewTemplate(string $template): string
    {
        $templateData = $this->getTemplate($template);

        $body = $this->sanitizeHtml($templateData['body']);
        $css = $this->sanitizeHtml($templateData['css']);

        return view('templates.invoices.simple', compact('body', 'css'))->render();
    }

    public function createPdf(string $template, array $data): string
    {
        $response = $this->client()
            ->withQueryParameters([
                'template_id' => $template,
                'export_type' => 'file',
            ])
            ->post('/create-pdf', $data);

        return $response->body();
    }

    private function sanitizeHtml(string $content): string
    {
        return htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
    }
}
