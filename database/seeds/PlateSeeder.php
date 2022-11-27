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

        $img = [
            'https://media-assets.lacucinaitaliana.it/photos/61faed8c215f849851de42e5/1:1/w_2240,c_limit/Risotto-al-salto.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fac32391ff55922ebd8ddc/1:1/w_2240,c_limit/empty',
            'https://media-assets.lacucinaitaliana.it/photos/620fc019d274969b4db76088/1:1/w_2240,c_limit/SCHIACCIATINA-TOSCANA.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/620fc04f3efbdbcf4ed70e7e/1:1/w_2240,c_limit/RUSTICO-LECCESE.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd274a9464ddbce0e649cf/1:1/w_2240,c_limit/Capesante-alla-veneziana.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/62cd8cc59ac43bd623be70ae/1:1/w_2240,c_limit/vitello-tonnato.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd3a7868e6af3c98a64a5b/1:1/w_2240,c_limit/Schiacciata-di-cipolle-di-Cannara.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fa9db28794628b4cf2734a/1:1/w_2240,c_limit/empty',
            'https://media-assets.lacucinaitaliana.it/photos/61fd207cdb18a2f910e0d80c/1:1/w_2240,c_limit/Caserecce-alla-trapanese.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd318cca2a0bef2dcdaa20/1:1/w_2240,c_limit/Culingiones2.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/620fc197eada9bef3c3959d6/1:1/w_2240,c_limit/09201406501-Cropped.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd2099ae5defefed730cbd/1:1/w_2240,c_limit/Fusilli-molisani-con-sugo-e-caciocavallo.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd1f492f4aca88c9fdd8b4/1:1/w_2240,c_limit/Ravioli-al-formaggio.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd3970a9db3736d06bc44b/1:1/w_2240,c_limit/Vincisgrassi.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd394460b78fb3b815968a/1:1/w_2240,c_limit/budino-di-farro-450x410.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fae8ddf487b479085fc109/1:1/w_2240,c_limit/empty',
            'https://media-assets.lacucinaitaliana.it/photos/61fae7435a704c73d6d10930/1:1/w_2240,c_limit/Busecca-matta.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd2681395b99b5cb478558/1:1/w_2240,c_limit/crema-di-asparagi-alla-milanese-.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd2b00802734d1e3672447/1:1/w_2240,c_limit/Zucca-fritta.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd38a628bbd1b96fb68565/1:1/w_2240,c_limit/Trenette-al-pesto.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd35bbac066a13fdfec3b6/1:1/w_2240,c_limit/Maritozzi4.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd3af01e2e9283b050c970/1:1/w_2240,c_limit/Spezzatino-di-pollo-con-le-olive.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd2c7b3b4420428d268010/1:1/w_2240,c_limit/Mitili-ripieni-alla-spezzina.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd24bd66016c5cf19ed7df/1:1/w_2240,c_limit/Tonno-fresco-alla-genovese.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd3161793c88daa2d27a98/1:1/w_2240,c_limit/CONDIJUN-INSALATA-LIGURE.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd32bda2d089ca3edec560/1:1/w_1920,c_limit/BURIDDA-DI-STOCCAFISSO.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd32aea9db3736d06bc3ea/1:1/w_1920,c_limit/seppie-in-zimino.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd25cbf3293fb2a0da1c34/1:1/w_1920,c_limit/Crostini-alla-provatura-e-alici.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61faf0ccf9bff304ce3ebd2e/1:1/w_1920,c_limit/empty',
            'https://media-assets.lacucinaitaliana.it/photos/61fd213da716fd384e85dc47/1:1/w_1920,c_limit/Capunsei2-450x410.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd20e1a9db3736d06bc01e/1:1/w_1920,c_limit/Fritto-alla-Garisenda.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd30fd1e2e9283b050c886/1:1/w_1920,c_limit/Zucchine-a-scapece1.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd30f1f9bff304ce3ecd6a/1:1/w_1920,c_limit/Frico.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd1f575817efd931c4e11e/1:1/w_1920,c_limit/Cotolette-alla-bolognese.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd1ee2f9bff304ce3ec9ed/1:1/w_1920,c_limit/11201412401-Cropped.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd2c512d7337e4e9d5a96d/1:1/w_1920,c_limit/Maccheroni-alla-chitarra.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd3395c45ed6180886a2bf/1:1/w_1920,c_limit/lumachealpomodoro.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd33d853797678cdac0bd9/1:1/w_1920,c_limit/lasagneallanapoletana.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd26a6f9bff304ce3ecb06/1:1/w_1920,c_limit/Piselli-con-guanciale.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd39eba9db3736d06bc44d/1:1/w_1920,c_limit/Passatelli.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd2fcdf9bff304ce3ecc79/1:1/w_1920,c_limit/Rigatoni-con-pagliata2.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd39baa2d089ca3edec5ce/1:1/w_1920,c_limit/ragu-alla-napoletana-450x410.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fa52530a686bebc28a2137/1:1/w_1920,c_limit/Zuppa-di-Valpelline.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fa9a9ef6c07c3e710f66fb/1:1/w_1920,c_limit/alici-in-tortiera-450x410.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd352da2400246dfd3eb3d/1:1/w_1920,c_limit/Pitta-rustica-di-granoturco.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd2ce015168b69eb11b365/1:1/w_1920,c_limit/Sagne-chine5.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd1f7528bbd1b96fb68161/1:1/w_1920,c_limit/Vermicelli-in-salsa-abruzzese-2.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd274a2d7337e4e9d5a8cb/1:1/w_1920,c_limit/Strangolapreti-con-%E2%80%9Crag%C3%B9%E2%80%9D-al-peperoncino.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61faf1acf20e356b3d49e997/1:1/w_1920,c_limit/empty',
            'https://media-assets.lacucinaitaliana.it/photos/61fd30f7a9db3736d06bc34f/1:1/w_1920,c_limit/Piatto-derbe-alla-lucana1.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd24068fdd83f5eb76c1b3/1:1/w_1920,c_limit/Baccal%C3%A0-alla-triestina.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd21d06776100c3ea16292/1:1/w_1920,c_limit/Sbriciolata-di-crema-e-amarene.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd256ea716fd384e85dcd4/1:1/w_1920,c_limit/Cicoria-cacio-e-uova.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd3575ceddd9ba5372d703/1:1/w_1920,c_limit/Timballo-di-scrippelle.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fd278349f3f9794202653b/1:1/w_1920,c_limit/Cutturiddi-agnello-in-umido.jpg',
        ];

        $desc = [
            'Un piatto di recupero della cucina casalinga lombarda. Il buono di questo riso è la croccantezza: stendetelo molto sottile e cuocete quasi senza burro',
            'Una ricetta pasquale meno conosciuta è il pignato maritato, un secondo tipico campano che unisce in un caldo brodo un matrimonio di sapori, tra carni e verdure a foglia',
            'È la focaccetta all’olio delle merende lungo il litorale toscano: per lo più imbottita con salame toscano o finocchiona (salume locale aromatizzato con semi di finocchio), in versione dolce si farcisce con crema alla nocciola',
            'Diffuso in tutto il Salento, questo fagottino di sfoglia si trova in forni, bar, panetterie e chioschi sulle spiagge. Classico, con besciamella, pomodoro e mozzarella, oppure con aggiunta di prosciutto o con ricotta e spinaci',
            '',
            'Il vitello tonnato, chiamato anche vitel tonnè, è una ricetta di origine piemontese. È stato codificato da Artusi alla fine dell\'Ottocento, ma l\'abbinamento di carne bovina e tonno già si utilizzava nell\'antica cucina del Rinascimento.',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            'La busecca matta è una preparazione tipica lombarda che significa “trippa finta”: busecca, infatti, è il nome regionale del rumine (uno degli stomaci dei bovini che costituiscono la trippa), che si prepara con striscioline di frittata, salsa di pomodoro, pancetta e altri ingredienti; la “matta” è la versione più povera, e leggera',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            'Una ricetta semplice ma molto gustosa da fare con i piselli novelli. Si servono accompagnati da crostini di pane fritto, oppure insaporiti con menta fresca a striscioline',
            '',
            '',
            '',
            '',
            'Un piatto stupendo con i semplici profumi della terra e del mare',
            '',
            '',
            '',
            'Il “ragù” senza il consueto trito di carne è un’usanza tipica di alcune regioni del centro e del sud Italia: in Toscana si prepara con un corposo trito di verdure, senza carne, mentre a Napoli è un sugo di pomodoro cotto a lungo insieme a diversi tipi di carne, lasciati in pezzi interi. Il sugo si utilizza per condire la pasta, mentre la carne viene servita come portata principale.',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
        ];

        // $k = 0;

        for ($i = 0; $i < count($plates); $i++) {
            $randomImg = rand(1, 300);
            $plate = new Plate();
            $plate->name = $plates[$i];
            if (count($desc) > $i) {
                if ($desc[$i] === '')
                    $plate->description = 'La nostra ricetta del piatto: ' . $plates[$i];
                else
                    $plate->description = $desc[$i];
            } else
                $plate->description = $faker->paragraphs(rand(1, 3), true);
            $plate->price = $faker->randomFloat(1, 5, 15);
            $plate->is_visible = true;
            $plate->slug = Str::slug($plate->name);
            if (count($img) > $i)
                $plate->img = $img[$i];
            else
                $plate->img = "https://picsum.photos/id/$randomImg/400/200";

            $plate->restaurant_id = $restaurantIds[rand(0, count($restaurantIds) - 1)];

            $plate->save();
        }
    }
}
