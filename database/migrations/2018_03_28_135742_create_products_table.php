<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedInteger('subcategory_id')->nullable();
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
            $table->string('name');
            $table->string('image');
            $table->longtext('desc');
            $table->double('price', 10,2);
            $table->timestamps();
        });

        //Componenten
        DB::table('products')->insert(
            array(
                'category_id'=> 1,
                'subcategory_id'=> 1,
                'name'=> 'Intel Core i7 8700K',
                'image'=> 'Intel Core i7 8700K'.'.png',
                'desc'=> 'De Intel Core i7-8700K, codenaam "Coffee Lake", is de processor voor de fanatieke gamers en video editors.Dit topmodel van de 8e generatie Intel Core processoren, beschikt over zes verwerkingseenheden en is geschikt om op een moederbord met Socket 1151 te plaatsen. De processor beschikt over 12 MB Level 3 cache en werkt op een snelheid van 3.7 GHz.De Intel Core i7-8700K beschikt over een interne geheugencontroller, met twee geheugen kanalen en bevat een Intel HD Graphics interne grafische chip. Deze processor is tevens te overklokken als je meer rekenkracht nodig hebt.',
                'price'=> 339.00                
            )
        );

        DB::table('products')->insert(
            array(
                'category_id'=> 1,
                'subcategory_id'=> 1,
                'name'=> 'AMD Ryzen 5 2400G',
                'image'=> 'AMD Ryzen 5 2400G'.'.png',
                'desc'=> 'De AMD Ryzen 5 2400G met Radeon RX Vega 11 Graphics, codenaam Raven Ridge, beschikt over vier verwerkingseenheden en is geschikt om op een moederbord met Socket AM4 te plaatsen. De processor beschikt over 6 MB Level 3 cache en heeft een kloksnelheid van 3.6 GHz met een boost van 3.9 GHz. De AMD Ryzen 5 2400G wordt in retailverpakking (box) geleverd inclusief de Wraith Stealth koeler. De AMD Ryzen 5 2400G beschikt over een Vega 8 GPU met ondersteuning voor DDR4 tot 2933 MHz.',
                'price'=> 158.90               
            )
        );

        //Randapparatuur
        DB::table('products')->insert(
            array(
                'category_id'=> 2,
                'subcategory_id'=> 3,
                'name'=> 'BenQ EX3200R', 
                'image'=> 'BenQ EX3200R'.'.png',
                'desc'=> 'De BenQ EX3200R is geschikt voor hardcore gamers dankzij de hoge verversingssnelheid van 144 Hz en snelle reactietijd. De EX3200R biedt een ongekende gaming-ervaring met het 32 inch curved Full HD beeldscherm, die bovendien in hoogte verstelbaar is. De hoge verversingssnelheid van 144 Hz is ideaal voor veeleisende gamer, omdat hierdoor beelden sneller achter elkaar ververst worden waardoor gameplay nog vloeiender wordt weergegeven. Het VA-paneel zorgt voor extra diepe zwartweergave doordat het scherm geen achtergrondverlichting nodig heeft om zwartwaarden te tonen, waardoor zwart dus ook echt zwart is. Een ander voordeel van het VA-paneel is dat het contrast hoger ligt ten opzichte van TN-panelen, waardoor kleuren levendiger overkomen.',
                'price'=> 299.00              
            )
        );

        DB::table('products')->insert(
            array(
                'category_id'=> 2,
                'subcategory_id'=> 4,
                'name'=> 'Logitech Z-623',
                'image'=> 'Logitech Z-623'.'.png',
                'desc'=> 'Het Logitech Z623 2.1 Speakersysteem levert indrukwekkend en krachtig 2.1-geluid. De Z623 is THX®-gecertificeerd en dit betekent kwaliteit waarop je kunt vertrouwen: deze speakers voldoen aan de strikte prestatie-eisen die voor THX-goedkeuring worden gesteld. Je hoort én voelt intense audio van 200 watt RMS-vermogen zodat muziek, films en games tot leven worden gebracht.',
                'price'=> 136.00               
            )
        );

        DB::table('products')->insert(
            array(
                'category_id'=> 2,
                'subcategory_id'=> 5,
                'name'=> 'CORSAIR Gaming K55 RGB',
                'image'=> 'CORSAIR Gaming K55 RGB'.'.png',
                'desc'=> 'Het K55 gaming toetsenbord met RGB verlichting is uw eerste stap naar verhoogde prestaties bij het gamen. Blijf uw tegenstanders een stap voor dankzij 6 programmeerbare toetsen. Multi-key anti-ghosting zorgt ervoor dat alle input correct doorgevoerd wordt, zelfs al zijn er verschillende toetsen gelijktijdig ingedrukt. Er zijn toegewijde knoppen voorzien voor het verzetten van het volume en het afspelen van media zonder uw spelervaring te verstoren. De RGB-achtergrondverlichting beschikt over enkele intuïtieve verlichtingsmodi die naar eigen voorkeur kunnen worden aangepast. De afneembare zachte rubberen polsrust draagt bij tot extra comfort bij langere gaming sessies.',
                'price'=> 54.95
            )
        );

        DB::table('products')->insert(
            array(
                'category_id'=> 2,
                'subcategory_id'=> 3,
                'name'=> 'Dell UltraSharp U2518D',
                'image'=> 'Dell UltraSharp U2518D'.'.png',
                'desc'=> 'De Dell Ultrasharp serie is ideaal voor grafische vormgeving, foto- en videobewerking of voor kantooromgevingen. Het 25 inch beeldscherm van de U2518D biedt een hoge WQHD-resolutie van 2560 x 1440 pixels. Het beeld is scherper dan de gemiddelde Full HD-monitor, waarbij je ook extra bureaubladruimte tot je beschikking krijgt voor bijvoorbeeld Photoshop of het plaatsen van meerdere vensters.',
                'price'=> 312.95               
            )
        );

        //Laptop & PC
        DB::table('products')->insert(
            array(
                'category_id'=> 3,
                'subcategory_id'=> 6,
                'name'=> 'HP Probook 430 G4',
                'image'=> 'HP Probook 430 G4'.'.png',
                'desc'=> 'Het dunne, lichte, stoere ontwerp van de HP ProBook 430 geeft mobiele professionals krachtige tools om onderweg productief te blijven. Deze ProBook is uitgerust voor productiviteit en biedt de prestatie- en beveiligingsfuncties die essentieel zijn voor het mobiele personeel van vandaag. Ideaal voor professionals in zakelijke omgevingen of kleine tot middelgrote bedrijven, die een betaalbare combinatie van innovatie, essentiële beveiliging en multimediamogelijkheden willen.',
                'price'=> 930.49              
            )
        );

        DB::table('products')->insert(
            array(
                'category_id'=> 3,
                'subcategory_id'=> 6,
                'name'=> 'HP Probook 450 G4',
                'image'=> 'HP Probook 450 G4'.'.png',
                'desc'=> 'De HP ProBook 450 G4 is afgestemd op productiviteit en biedt de prestatie- en beveiligingskenmerken, die onmisbaar zijn voor hedendaagse gebruikers. Het elegante, robuuste ontwerp biedt professionals een flexibel platform om binnen én buiten kantoor productief te werken.',
                'price'=> 879.00
            )
        );

        //Gaming
        DB::table('products')->insert(
            array(
                'category_id'=> 4,
                'subcategory_id'=> 9,
                'name'=> 'ThrustMaster TMX PRO',
                'image'=> 'ThrustMaster TMX PRO'.'.png',
                'desc'=> 'De Thrustmaster TMX PRO is het nieuwste Force Feedback racestuur voor de X-Box One. Door het aandrijfmechanisme met instelbare force feedback is elk steentje op de weg voelbaar. Verlies jij de grip over het stuur dan ga je dit meteen merken. Dit alles om je de beste race eigenschappen te garanderen. De Thrustmaster TMX PRO is een racestuur afgewerkt met rubber, dit om de beste grip te hebben op je stuur. Om het helemaal af te maken heeft Thrustmaster twee schakelflippers van metaal gemonteerd op het stuur. Dit om zo snel mogelijk te schakelen tijdens je race.',
                'price'=> 214.94                
            )
        );

        DB::table('products')->insert(
            array(
                'category_id'=> 4,
                'subcategory_id'=> 8,
                'name'=> 'SteelSeries Rival 500',
                'image'=> 'SteelSeries Rival 500'.'.png',
                'desc'=> 'De Rival 500 is een MOBA / MMO muis ontworpen om te functioneren met de natuurlijke bewegingen van je hand. De zijdelingse knoppen lay-out is ontworpen voor de natuurlijke contouren van je duim en om nauwkeurig en vloeiend te reageren. Het oude 12-knoppen ontwerp voorbij, met de komt van de Flick switches. Welke gemakkelijker en sneller met je duim zijn in te drukken en te bedienen. En wees nooit meer verrast wanneer je mana-pool ontoereikend is door de Tactile Alerts, hiermee voel je in-game events met een unieke vibratie voor elke gebeurtenis. Alles komt samen om de meest dynamische game-ervaring mogelijk te maken en te helpen meer controle over je game te krijgen.',
                'price'=> 78.99
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
