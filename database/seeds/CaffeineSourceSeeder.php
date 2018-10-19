<?php

use Illuminate\Database\Seeder;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class CaffeineSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $client = new Client();
        $result = $client->get('https://www.caffeineinformer.com/search#stq=drink&stp=13', ['verify' => false]);

        $testDrinks = array(
            array(
                '7 Eleven Brewed Coffee',
                280,
                '7 Eleven Brewed Coffee is freshly brewed hourly at 7 Eleven convenience stores.'),
            array(
                '5 Hour Energy',
                200,
                'The manufacturers claim the drink will give you 5 hours of energy without crashing. The drink is non-carbonated and sweetened with Sucralose (Splenda).'),
            array(
                'RootJack Caffeinated Pirate Root Beer',
                120,
                'This product would be considered more of an energy drink than a  rootbeer soda because of its high caffeine content and Rootjack\'s use of Vitamin C and Guarana. In fact, their website describes the beverage as a "Pirate Energy Drink" .'),
            array(
                'Monster M3 Energy Drink',
                160,
                'It uses Monster\'s nitrous technology and tastes similar to the Original Monster Energy Drink, but much more concentrated.'),
            array(
                '5 Hour Energy Decaf',
                6,
                '5 Hour Energy Decaf contains 3.00 mgs of caffeine per fluid ounce (10.14mg/100 ml).'),
            array(
                'Rockstar (NZ / Aus)',
                151,
                'Rockstar\'s original flavored energy drink reformulated for the Australia and New Zealand Market. Less caffeine and no Milk Thistle.'),
            array(
                'Rockstar Blackout Energy Drink',
                160,
                'Rockstar Blackout Energy drink is a vanilla, blueberry, and blackberry flavored variation of Rockstar Energy.'),
            array(
                'Cannonball Coffee Maximum Charge',
                1101,
                'A recent certified lab test found that an average sample contained 310 mg of caffeine per 100ml when using 4 oz (56g) of ground coffee beans to 12 fl oz (355ml) of water. This is the recommended way to brew Maximum Charge.'),
            array(
                'Starbucks Classics Caffe Mocha',
                510,
                'It is sold in a 48 fl oz bottle and there are six, 8 fl.oz. servings per carton. Each serving would contain 85mg of caffeine.'),
            array(
                'Barista Bros Iced Coffee',
                20,
                'Barista Bros. Iced Coffee is a popular bottled coffee flavored milk product in Australia and produced by Coca Cola.'),
            array(
                'GaGa Energy',
                80,
                'Generated product'),
            array(
                'Tru Blood Energy',
                50,
                'Generated product'),
            array(
                'Vital Energy',
                150,
                'Generated product'),
            array(
                'Epiphany Energy',
                80,
                'Generated product'),
            array(
                'Helix Energy',
                170,
                'Generated product'),
            array(
                'EnerBee Energy',
                100,
                'Generated product'),
            array(
                'TAPOUT Energy',
                200,
                'Generated product'),
            array(
                'Quad Energy',
                140,
                'Generated product'),
            array(
                'Home made cup of Coffee - With Love',
                140,
                'Home made cup of coffee, best enjoyed with a dog friend.')
        );

        foreach ($testDrinks as $key => $value) {
            DB::table('caffeine_sources')->insert([
                'name'              => $value[0],
                'description'       => $value[2],
                'value'             => $value[1],
            ]);
        }

    }
}
