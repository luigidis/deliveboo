<?php

use App\Plate;
use App\Restaurant;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $restaurantIds = Restaurant::all()->pluck('id');

        $plates = [
            'Risotto al salto, ricetta classica',
            'Pignato maritato della Campania',
            'Schiacciatina toscana, la versione dolce',
            'Rustico leccese, la ricetta tipica pugliese',
            'Capesante alla veneziana',
            'Vitello tonnato',
            'Schiacciata di cipolle di Cannara',
            'Frittelle di mele',
            'Caserecce alla trapanese',
            'Culingiones',
            'Rustico leccese',
            'Fusilli molisani con sugo e caciocavallo',
            'Ravioli al formaggio',
            'Vincisgrassi',
            'Budino di farro',
            'Olive ripiene all\'ascolana',
            '“Busecca matta”',
            'Crema di asparagi alla milanese',
            'Zucca fritta',
            'Trenette al pesto',
            'Maritozzi',
            'Spezzatino di pollo con le olive',
            'Mitili ripieni alla spezzina',
            'Tonno fresco alla genovese',
            'Condijun (insalata ligure)',
            'Burrida di stoccafisso',
            'Seppie in zimino',
            'Crostini alla provatura e alici',
            'Risotto alla milanese',
            'Capunsei',
            'Fritto alla Garisenda',
            'Zucchine a scapece',
            'Frico',
            'Cotolette alla bolognese',
            'Polpo al ragù',
            'Maccheroni alla chitarra',
            'Lumache al pomodoro',
            'Lasagne alla napoletana',
            'Piselli con guanciale',
            'Passatelli',
            'Rigatoni con pagliata',
            'Ragù alla napoletana',
            'Zuppa di Valpelline',
            'Alici in tortiera',
            'Pitta rustica di granoturco',
            'Sagne chine',
            'Vermicelli in salsa abruzzese',
            'Strangolapreti con “ragù” al peperoncino',
            'Fettuccine all\'abruzzese',
            'Piatto d\'erbe alla lucana',
            'Baccalà alla triestina',
            'Sbriciolata di crema e amarene',
            'Cicoria, cacio e uova',
            'Timballo di scrippelle',
            'Cutturiddi, agnello in umido',
        ];

        // $k = 0;

        for ($i = 0; $i < count($plates); $i++) {
            $randomImg = rand(1, 300);
            $plate = new Plate();
            $plate->name = $plates[$i];
            $plate->description = $faker->paragraphs(rand(2, 10), true);
            $plate->price = $faker->randomFloat(2, 2, 50);
            $plate->is_visible = true;
            $plate->slug = Str::slug($plate->name);
            $plate->img = "https://picsum.photos/id/$randomImg/400/200";

            $plate->restaurant_id = $restaurantIds[rand(0, count($restaurantIds) - 1)];

            // if (!(($i + 1) % 5)) {
            //     $k++;
            // }

            $plate->save();
        }
    }
}
