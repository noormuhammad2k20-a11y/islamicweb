<?php

$dir = __DIR__ . '/app/Http/Controllers';

$replacements = [
    'NamazGuideController.php' => <<<EOD
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NamazGuide;

class NamazGuideController extends Controller
{
    public function index()
    {
        \$guides = NamazGuide::all();
        return view('pages.namaz.index', compact('guides'));
    }

    public function salah()
    {
        \$guides = NamazGuide::all();
        return view('pages.namaz.salah', compact('guides'));
    }

    public function show(\$prayer)
    {
        \$guide = NamazGuide::where('title', 'like', "%{\$prayer}%")->firstOrFail();
        return view('pages.namaz.show', compact('guide'));
    }
}
EOD,
    'HajjUmrahController.php' => <<<EOD
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HajjGuide;

class HajjUmrahController extends Controller
{
    public function hajjGuide()
    {
        \$guides = HajjGuide::where('type', 'hajj')->get();
        return view('pages.hajj_umrah.hajj_guide', compact('guides'));
    }

    public function umrahGuide()
    {
        \$guides = HajjGuide::where('type', 'umrah')->get();
        return view('pages.hajj_umrah.umrah_guide', compact('guides'));
    }

    public function hajjDuas() { return view('pages.hajj_umrah.hajj_duas'); }
    public function umrahDuas() { return view('pages.hajj_umrah.umrah_duas'); }
    public function hajjChecklist() { return view('pages.hajj_umrah.hajj_checklist'); }
    public function umrahChecklist() { return view('pages.hajj_umrah.umrah_checklist'); }
    public function hajjFaqs() { return view('pages.hajj_umrah.hajj_faqs'); }
}
EOD,
    'IslamicKnowledgeController.php' => <<<EOD
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KnowledgeCategory;

class IslamicKnowledgeController extends Controller
{
    public function index()
    {
        \$categories = KnowledgeCategory::all();
        return view('pages.knowledge.index', compact('categories'));
    }

    public function pillarsIslam() { return view('pages.knowledge.pillars_islam'); }
    public function pillarsIman() { return view('pages.knowledge.pillars_iman'); }
    public function namesOfAllah() { return view('pages.knowledge.names_allah'); }
    public function prophets() { return view('pages.knowledge.prophets'); }
    public function history() { return view('pages.knowledge.history'); }
    public function facts() { return view('pages.knowledge.facts'); }
}
EOD
];

foreach ($replacements as $filename => $content) {
    file_put_contents("$dir/$filename", $content);
    echo "Updated $filename\n";
}
