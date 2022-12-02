<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Restaurant;
use App\User;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $img = [
            'https://citynews-romatoday.stgy.ovh/~media/horizontal-mid/52295577773865/unnamed-2020-07-27t134402-606-2.jpg',
            'https://static.gamberorosso.it/2020/03/ristorante1-768x512.jpg',
            'https://blog.italotreno.it/wp-content/uploads/2018/10/Ristoranti-particolari-Brescia-Areadocks-4-1140x660.jpg',
            'https://www.ristorazioneitalianamagazine.it/CMS/wp-content/uploads/2021/02/ristoranti-futuro.jpg',
            'https://media-cdn.tripadvisor.com/media/photo-s/1a/16/32/e3/wine-room-dari-ristorante.jpg',
            'https://www.finedininglovers.it/sites/g/files/xknfdk1106/files/styles/im_landscape_100/public/fdl_content_import_it/ristoranti-gourmet-firenze.jpg.webp?itok=CBx1XuAG',
            'https://media-assets.lacucinaitaliana.it/photos/61fac87d07be724774c9c789/16:9/w_2560%2Cc_limit/A5A4473.jpeg',
            'https://buonricordo.com/ristoranti/veneto/ristorante-da-gigetto/@@images/eac57071-7f07-4456-b738-b279ab56dd13.jpeg',
            'https://media-assets.lacucinaitaliana.it/photos/61fabb4351116b1ead93053e/16:9/w_2560%2Cc_limit/landscape-italiani-nel-mondo.jpg',
            'https://www.milanotoday.it/~media/horizontal-hi/12626845478540/ristorante-forte-milano-5.jpeg',
            'https://flawless.life/wp-content/uploads/2021/11/I-Ristoranti-a-Milano-da-Provare-a-Dicembre-La-briciola-cover.jpg',
            'https://images.squarespace-cdn.com/content/v1/61601af578a03b5805891a87/382a7e53-577e-4993-a0e8-66c689e542f6/siyuan-g_V2rt6iG7A-unsplash%2B%281%29.jpg?format=1000w',
            'https://wips.plug.it/cips/italiaonline.it/blog/cms/2021/12/ristorante.jpg?w=750&h=422&a=c',
            'https://www.corriere.it/methode_image/socialshare/2020/10/20/08a841dc-12e6-11eb-85d0-55c1b589a562.jpg',
            'https://www.scattidigusto.it/wp-content/uploads/2020/12/Al-Mercato-steaks-burgers-Corso-Venezia-Milano-tavolo-1280x1920.jpg',
            'https://static.gamberorosso.it/2020/12/milano-mercatosteak.jpg',
            'https://www.ansa.it/webimages/ch_620x438/2020/4/6/049c44be1c78aac80af847865b903996.jpg',
            'https://www.corriere.it/methode_image/2020/10/25/Economia/Foto%20Economia%20-%20Trattate/322.0.66018831-kvQD-U3220449771190uMB-656x492@Corriere-Web-Sezioni.jpg',
            'https://www.snapitaly.it/wp-content/uploads/2018/04/28-posti.jpg',
            'https://images2.corriereobjects.it/methode_image/2018/12/18/Cucina/Foto%20Cucina%20-%20Trattate/3_l3hXlyM-kyJI-RMonksirHP8Q8h6Urr6Et5O-590x445@Corriere-Web-Sezioni.jpg?v=201812181819'
        ];
        $name = [
            'daGorini',
            'Marotta Ristorante',
            'Vecchia Osteria & Antigua Posada',
            'Trattoria Al Cacciatore – La Subida',
            'Ristorante Copacabana',
            'Fortaleza ',
            'Boa Vida Churrascaria',
            'Officina dell\'hamburger',
            'Village Grill & Kitchen',
            'Myke Burger',
            'Dinamo "Steak House & Music"',
            'Asian restaurant TON LU REN',
            'Rosticceria Cinese Stella D\'oro',
            'Rosticceria China Garden',
            'Wicky’s Innovative Japanese Cuisine',
            'Sushi Zero',
            'Kyo Sushi',
            'Kioto Sushi',
            'Watami Sushi Restaurant',
            'OK Sushi'
        ];
        $phone = [
            '339 1129463',
            '0332 937712',
            '0332 547316',
            '349 3302567',
            '339 5822194',
            '0332 554473',
            '0332 967724',
            '0332 448147',
            '346 7372323',
            '0332 947311',
            '0332 118343',
            '0332 349912',
            '0332 323792',
            '0332 227482',
            '0332 383323',
            '349 3472383',
            '339 3923822',
            '0332 985567',
            '0332 736223',
            '342 3238328'
        ];

        $userIds = User::all()->pluck('id');

        for ($i = 0; $i < count($img); $i++) {
            // $randomImg = rand(1, 300);
            $restaurant = new Restaurant();
            // $restaurant->name = $faker->unique()->company();
            $restaurant->name = $name[$i];
            $restaurant->slug = Restaurant::getUniqueSlugFromTitle($restaurant->name);
            // $restaurant->image = "https://picsum.photos/id/$randomImg/400/200";
            $restaurant->image = $img[$i];
            $restaurant->address = $faker->address();
            // $restaurant->phone = $faker->phoneNumber();
            $restaurant->phone = $phone[$i];
            $restaurant->p_iva = $faker->numerify('###########');
            $restaurant->user_id = $userIds[$i];

            $restaurant->save();
        }
    }
}
