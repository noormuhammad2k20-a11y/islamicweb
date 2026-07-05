STEP 5: MODEL — CREATE IF MISSING

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

\`\`\`php

// app/Models/CityPrayerContent.php

namespace App\\Models;

use Illuminate\\Database\\Eloquent\\Model;

class CityPrayerContent extends Model

{

protected $table = 'city\_prayer\_content';

protected $fillable = \[

'city\_slug','city\_name','country','country\_code',

'article\_en','article\_urdu','famous\_mosques',

'islamic\_history','calculation\_note',

'eid\_prayer\_note','jummah\_note','special\_note'

\];

protected $casts = \['famous\_mosques' => 'array'\];

}

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

