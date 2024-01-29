<?php
namespace Database\Seeders;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Post::create([
            'name' => 'Headache history ',
            'description' => '
            Description: Headache of sudden onset, reaching maximum intensity by five minutes (suggestive of subarachnoid haemorrhage). Worsening headache associated with fever, meningeal irritation (i.e. neck stiffness) and altered mental status (suggestive of bacterial, viral or fungal meningitis). New onset focal neurological deficit, personality change or cognitive dysfunction (e.g. intracranial haemorrhage, space-occupying lesion, encephalitis, meningitis). Decreased level of consciousness (e.g. raised intracranial pressure). Recent head trauma within the last 3 months (e.g. subdural haemorrhage). Headache which is posture dependent (e.g. a headache worse on lying down and when coughing is suggestive of raised ICP). Headache associated with tenderness in the temporal region (unilateral or bilateral) and jaw claudication (e.g. temporal arteritis). Headache associated with severe eye pain, reduced vision, nausea and vomiting (e.g. acute angle-closure glaucoma).
            ',
            'type' => 'post',
            'cost' => '50',
            'owner_id' => '2',
            'url' => 'https://www.w3schools.com/w3images/woods.jpg',
            'start_date' => '2020-02-02',
            'end_date' => '2020-02-03'
        ]);

        Post::create([
            'name' => 'Back Pain ',
            'description' => 'Description: HPI =Back or leg dominant pain, =Intermittent or constant pain, =Associated aggravating movement, =Non-mechanical vs. mechanical pain, =Red flags and yellow flags Red flags Neurological: diffuse motor/sensory loss, progressive neurological deficits, cauda equina syndrome Infection: fever, IV drug use, immune suppressed Fracture: trauma, osteoporosis risk/ fragility fracture Tumour: hx of cancer, unexplained weight loss, significant unexpected night pain, severe fatigue Inflammation: chronic low back pain > 3 months, age of onset < 45, morning stiffness > 30 minutes, improves with exercise, disproportionate night pain ',
            'type' => 'post',
            'cost' => '20',
            'owner_id' => '2',
            'url' => 'https://www.w3schools.com/w3images/la.jpg',
            'start_date' => '2020-03-02',
            'end_date' => '2020-03-03'
        ]);

    }
}
