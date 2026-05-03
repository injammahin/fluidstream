<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = trim((string) $request->get('q', ''));

        $pages = [
            [
                'type' => 'Page',
                'title' => 'Home',
                'url' => url('/'),
                'description' => 'Reduce methane emissions and increase oil production with Fluidstream technology.',
                'keywords' => 'home fluidstream multiphase compression methane reduction oil production emissions',
                'content' => 'Field proven results for demanding applications.',
            ],
            [
                'type' => 'Technology Page',
                'title' => 'Technology',
                'url' => url('/technology'),
                'description' => 'Fluidstream technology overview, autonomous controls, sealing, and multiphase performance.',
                'keywords' => 'technology fluidstream compressor pump engineering autonomous field system gland sealing piston tracking sand',
                'content' => 'Fluidstream technology uses patented multiphase compression methods for autonomous field performance and reliable operation.',
            ],
            [
                'type' => 'Technology Section',
                'title' => 'Liquid Handling Methodology',
                'url' => url('/technology#liquid-method'),
                'description' => 'Patent-focused methodology for handling incompressible liquids inside compression.',
                'keywords' => 'liquid handling methodology incompressible liquids mixed flow multiphase compression',
                'content' => 'Designed around the fact that liquids can enter the compression process and must be handled in a controlled credible way.',
            ],
            [
                'type' => 'Technology Section',
                'title' => 'Advanced Gland Sealing',
                'url' => url('/technology#gland-section'),
                'description' => 'Patent-pending gland sealing with electronic wear detection.',
                'keywords' => 'gland sealing wear detection seal integrity leak maintenance',
                'content' => 'Electronic wear detection gives earlier warning before sealing degradation becomes a leak outage or emergency callout.',
            ],
            [
                'type' => 'Technology Section',
                'title' => 'Piston Tracking and Adaptive Operation',
                'url' => url('/technology#tracking-section'),
                'description' => 'Full piston tracking for optimized control and upset protection.',
                'keywords' => 'piston tracking adaptive operation upset protection slugs solids ice control',
                'content' => 'Full piston tracking helps the system respond to slugs solids buildup and changing machine behavior.',
            ],
            [
                'type' => 'Technology Section',
                'title' => 'Sand Ready Sealing',
                'url' => url('/technology#sand-section'),
                'description' => 'Multiphase piston and gland sealing configured to optimize life in sand service.',
                'keywords' => 'sand ready sealing abrasive solids harsh service durability field survivability',
                'content' => 'Designed for abrasive unstable and remote field conditions.',
            ],
            [
                'type' => 'Page',
                'title' => 'Why Multiphase',
                'url' => url('/multiphase-compression-technology'),
                'description' => 'Why multiphase compression technology matters.',
                'keywords' => 'why multiphase multiphase compression multiphase pump oil gas emissions',
                'content' => 'Multiphase compression supports liquid and gas handling production optimization methane reduction and lower maintenance field operation.',
            ],
            [
                'type' => 'Application Page',
                'title' => 'Multiphase Pump and Multiphase Compression',
                'url' => url('/multiphase-compression'),
                'description' => 'Reliable autonomous multiphase compression technology for methane reduction and production improvement.',
                'keywords' => 'multiphase pump multiphase compression methane production optimization oil gas',
                'content' => 'Move mixed flow lower pressure compress gas oil water and condensate together.',
            ],
            [
                'type' => 'Application Page',
                'title' => 'Vapor Recovery',
                'url' => url('/vapor-recovery'),
                'description' => 'Capture valuable gas, reduce venting and emissions, and improve operational efficiency.',
                'keywords' => 'vapor recovery venting emissions gas capture recovery tank vapor',
                'content' => 'Compact field ready vapor recovery systems.',
            ],
            [
                'type' => 'Application Page',
                'title' => 'Casing Gas Compression',
                'url' => url('/casing-gas-compression'),
                'description' => 'Compress low pressure casing gas to support production optimization and reduce flaring.',
                'keywords' => 'casing gas compression casing gas flaring low pressure gas production',
                'content' => 'Unlock additional site value from casing gas.',
            ],
            [
                'type' => 'Resource Page',
                'title' => 'Case Studies',
                'url' => url('/case-studies'),
                'description' => 'Real-world field applications and performance results.',
                'keywords' => 'case studies results field performance proof points demanding applications production emissions',
                'content' => 'Case studies include measurable production gains emissions reduction reliability improvements and documented Fluidstream performance.',
            ],
            [
                'type' => 'Resource Page',
                'title' => 'Insights',
                'url' => url('/insights'),
                'description' => 'Technical insights and articles.',
                'keywords' => 'insights articles technical knowledge resources engineering compression fundamentals',
                'content' => 'Technical content covering industry challenges compression fundamentals and engineering perspectives.',
            ],
            [
                'type' => 'Page',
                'title' => 'Patents',
                'url' => url('/patented-technology'),
                'description' => 'Patented Fluidstream technology.',
                'keywords' => 'patented technology patent innovation compression pump system US11098709B2',
                'content' => 'Patented technology for multiphase compression vapor recovery casing gas compression and emissions reduction.',
            ],
            [
                'type' => 'Page',
                'title' => 'About Us',
                'url' => url('/about-us'),
                'description' => 'Company information and background.',
                'keywords' => 'about us company team fluidstream background mission',
                'content' => 'Fluidstream company profile mission technology background and industry focus.',
            ],
            [
                'type' => 'Page',
                'title' => 'Contact',
                'url' => url('/contact'),
                'description' => 'Contact Fluidstream for project inquiries and technical discussion.',
                'keywords' => 'contact quote inquiry email phone location support technical review',
                'content' => 'Contact Fluidstream for applications technical discussion and business communication.',
            ],
        ];

        $results = [];

        if ($query !== '') {
            $normalizedQuery = $this->normalize($query);
            $words = array_filter(explode(' ', $normalizedQuery));

            foreach ($pages as $page) {
                $title = $this->normalize($page['title']);
                $description = $this->normalize($page['description']);
                $keywords = $this->normalize($page['keywords']);
                $content = $this->normalize($page['content']);
                $fullText = "{$title} {$description} {$keywords} {$content}";

                $score = 0;

                if ($title === $normalizedQuery) $score += 120;
                if (str_starts_with($title, $normalizedQuery)) $score += 90;
                if (str_contains($title, $normalizedQuery)) $score += 70;
                if (str_contains($keywords, $normalizedQuery)) $score += 60;
                if (str_contains($description, $normalizedQuery)) $score += 50;
                if (str_contains($content, $normalizedQuery)) $score += 45;
                if (str_contains($fullText, $normalizedQuery)) $score += 35;

                foreach ($words as $word) {
                    if (str_contains($title, $word)) $score += 22;
                    if (str_contains($keywords, $word)) $score += 18;
                    if (str_contains($description, $word)) $score += 14;
                    if (str_contains($content, $word)) $score += 10;
                }

                if ($score > 0) {
                    $page['score'] = $score;
                    $results[] = $page;
                }
            }

            usort($results, fn ($a, $b) => $b['score'] <=> $a['score']);
        }

        return view('search.index', [
            'query' => $query,
            'results' => $results,
            'total' => count($results),
        ]);
    }

    private function normalize(string $value): string
    {
        $value = strtolower($value);
        $value = preg_replace('/[^a-z0-9]+/i', ' ', $value);
        return trim(preg_replace('/\s+/', ' ', $value));
    }
}