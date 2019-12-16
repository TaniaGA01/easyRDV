<?php

use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\Types\Integer;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'last_name' => 'Cé',
                'first_name' => 'David',
                'email' => 'randomdada@gmail.com',
                'password' => bcrypt('1234'),
                'adresse' => '41 Random Street',
                'city_id' => '1',
                'role_id' => '2',
                'profession_id' => '10',
                'image' => 'David_C_Chasseur-de-Troll.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Crevard',
                'first_name' => 'Jean-Michel',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '2 Boulevard Gérard Baste',
                'city_id' => '1',
                'role_id' => '2',
                'profession_id' => '11',
                'image' => 'Jean-Michel_Crevard_Avocat.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Connare',
                'first_name' => 'Jean-Michel',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '12 rue Comic sans MS',
                'city_id' => '9',
                'role_id' => '2',
                'profession_id' => '11',
                'image' => 'Jean-Michel_Connare_Avocat.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Bastar',
                'first_name' => 'Christian',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '21 Snow Street',
                'city_id' => '9',
                'role_id' => '2',
                'profession_id' => '11',
                'image' => 'Christian_Bastar_Avocat.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Baveux',
                'first_name' => 'Jean-Luc',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => 'Boulevard des truands',
                'city_id' => '2',
                'role_id' => '2',
                'profession_id' => '11',
                'image' => 'Jean-Luc_Baveux_Avocat.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Lescrault',
                'first_name' => 'Jean-Pierre',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '327 Avenue Véronique Genest',
                'city_id' => '1',
                'role_id' => '2',
                'profession_id' => '11',
                'image' => 'Jean-Pierre_Lescrault_Avocat.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Le Barbu',
                'first_name' => 'Maxime',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '23 rue des traîtres',
                'city_id' => '5',
                'role_id' => '2',
                'profession_id' => '12',
                'image' => 'Maxime_Le-Barbu_Barbier.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Aupouhalt',
                'first_name' => 'Philippe',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '75 rue Java',
                'city_id' => '5',
                'role_id' => '2',
                'profession_id' => '12',
                'image' => 'Philippe_Aupouhalt_Barbier.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'De Taille',
                'first_name' => 'Max',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '65 boulevard Fauche',
                'city_id' => '5',
                'role_id' => '2',
                'profession_id' => '12',
                'image' => 'Max_De-Taille_Barbier.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Dupoil',
                'first_name' => 'Erwann',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '22 rue Java-sur-seine',
                'city_id' => '13',
                'role_id' => '2',
                'profession_id' => '12',
                'image' => 'Erwann_Dupoil_Barbier.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Sete',
                'first_name' => 'Damien',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '7 Boulevard du Skill',
                'city_id' => '13',
                'role_id' => '2',
                'profession_id' => '12',
                'image' => 'Damien_Sete_Barbier.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Nougaret',
                'first_name' => 'Adrien',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '12 rue des patrons',
                'city_id' => '17',
                'role_id' => '2',
                'profession_id' => '12',
                'image' => 'Adrien_Nougaret_Barbier.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'De la Vieille Barbe',
                'first_name' => 'Xavier',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => 'Quartier de la petite Moldavie',
                'city_id' => '2',
                'role_id' => '2',
                'profession_id' => '12',
                'image' => 'Xavier_De-la-Vieille-Barbe_Barbier.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Palat',
                'first_name' => 'Coro',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '24 rue Ben Honssépa',
                'city_id' => '17',
                'role_id' => '2',
                'profession_id' => '12',
                'image' => 'Coro_Palat_Barbier.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Warlord',
                'first_name' => 'Eustache',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '25 Boulevard Pandorre',
                'city_id' => '12',
                'role_id' => '2',
                'profession_id' => '5',
                'image' => 'Eustache_Warlord_Psychopathe.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Rockfeller',
                'first_name' => 'Superman',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '36 Avenue Pas-loin-de-Fougères',
                'city_id' => '9',
                'role_id' => '2',
                'profession_id' => '5',
                'image' => 'Superman_Rockfeller_Psychopathe.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Dus',
                'first_name' => 'Jean-Claude',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '40 rue du Bâton',
                'city_id' => '5',
                'role_id' => '2',
                'profession_id' => '5',
                'image' => 'Jean-Claude_Dus_Psychopathe.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Lear',
                'first_name' => 'Lock',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => 'Boulevard des tarés',
                'city_id' => '19',
                'role_id' => '2',
                'profession_id' => '5',
                'image' => 'Lock_Lear_Psychopathe.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Nicoleson',
                'first_name' => 'Jacques',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '41 Boulevard du Nid',
                'city_id' => '12534',
                'role_id' => '2',
                'profession_id' => '1',
                'image' => 'Jacques_Nicoleson_Neurologue.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Cabochard',
                'first_name' => 'Michel',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '40 rue Randomme',
                'city_id' => '123',
                'role_id' => '2',
                'profession_id' => '1',
                'image' => 'Michel_Cabochard_Neurologue.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Dubois',
                'first_name' => 'Jean-Jacques',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => 'Dans les bois',
                'city_id' => '8834',
                'role_id' => '2',
                'profession_id' => '6',
                'image' => 'Dubois_Jean-Jacques_Ramasseur-de-champignons.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Le Men',
                'first_name' => 'Thierry',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '21 rue Samerre',
                'city_id' => '5234',
                'role_id' => '2',
                'profession_id' => '6',
                'image' => 'Thierry_Le-Men_Ramasseur-de-champignons.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Poulpe',
                'first_name' => 'Jean',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '14 Corniche Machin',
                'city_id' => '13',
                'role_id' => '2',
                'profession_id' => '6',
                'image' => 'Jean_Poulpe_Ramasseur-de-champignons.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Géraldounet',
                'first_name' => 'Jean',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '14 rue des milles yeux',
                'city_id' => '25648',
                'role_id' => '2',
                'profession_id' => '7',
                'image' => 'Jean_Géraldounet.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Glandu',
                'first_name' => 'Jacques',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '25 Pas-de-skill',
                'city_id' => '30210',
                'role_id' => '2',
                'profession_id' => '7',
                'image' => 'Jacques_Glandu_Flyfu--er.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Le Tondu',
                'first_name' => 'Félicien',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '2 Bld des trois frères',
                'city_id' => '13000',
                'role_id' => '2',
                'profession_id' => '8',
                'image' => 'Félicien_Le-Tondu_Moine-à-temps-partiel.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Hamon',
                'first_name' => 'Benoît',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => 'Avenue des oubliés',
                'city_id' => '7575',
                'role_id' => '2',
                'profession_id' => '9',
                'image' => 'Benoît_Hamon_Socialiste-dépressif.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Gatsby',
                'first_name' => 'Loreena',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('1234'),
                'adresse' => '18 Rue des Amours Perdus',
                'city_id' => '2551',
                'role_id' => '2',
                'profession_id' => '10',
                'image' => 'Loreena_Gatsby_Chasseur-de-Troll.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Raffarin',
                'first_name' => 'Jean-Pierre',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => 'Avenue des Branlos',
                'city_id' => '3582',
                'role_id' => '2',
                'profession_id' => '13',
                'image' => 'Jean-Pierre_Raffarin_Stagiaire-spécialisé-Maison-du-Café.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Rypkonovitch',
                'first_name' => 'Samuel',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => 'Lieu-dit Fond-perdu',
                'city_id' => '27506',
                'role_id' => '2',
                'profession_id' => '14',
                'image' => 'Samuel_Rypkonovitch_Web-designer.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Komovitch',
                'first_name' => 'Yera',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '84 Boulevard de la gare',
                'city_id' => '5677',
                'role_id' => '2',
                'profession_id' => '14',
                'image' => 'Yera_Komovitch_Web-designer.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Latanneuse',
                'first_name' => 'Jasmine',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => 'Rue Salamander',
                'city_id' => '5423',
                'role_id' => '2',
                'profession_id' => '14',
                'image' => 'Jasmine_Latanneuse_Web-designer.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Lemito',
                'first_name' => 'Nicolas',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => 'Rue du poker-menteur',
                'city_id' => '5423',
                'role_id' => '2',
                'profession_id' => '15',
                'image' => 'Nicolas_Lemito_Péripapétitienne.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Zemmour',
                'first_name' => 'Éric',
                'email' => 'filsdelache@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => 'Prison de la Santé',
                'city_id' => '3582',
                'role_id' => '2',
                'profession_id' => '15',
                'image' => 'Éric_Zemmour_Péripapétitienne.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Chiffre',
                'first_name' => 'Estelle',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => 'Sur les routes',
                'city_id' => '3582',
                'role_id' => '2',
                'profession_id' => '15',
                'image' => 'Estelle_Chiffre_Péripapétitienne.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Reactavel',
                'first_name' => 'Jef',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '16 rue Ceaiparlat',
                'city_id' => '23443',
                'role_id' => '2',
                'profession_id' => '16',
                'image' => 'Jef_Reactavel_Développeur-Web.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'De La Joie',
                'first_name' => 'Eloha',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '19 bld Anarki',
                'city_id' => '29419',
                'role_id' => '2',
                'profession_id' => '16',
                'image' => 'Eloha_De-La-Joie_Développeur-Web.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'La Baston',
                'first_name' => 'Marie-Pierre',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '36 rue du taf',
                'city_id' => '18524',
                'role_id' => '2',
                'profession_id' => '16',
                'image' => 'Marie-Pierre_La-Baston_Développeur-Web.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Lechok',
                'first_name' => 'Jean-Luc',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => 'Avenue du peuple',
                'city_id' => '666',
                'role_id' => '2',
                'profession_id' => '17',
                'image' => 'Jean-Luc_Lechok_Laveur-de-cerveau.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Harvey',
                'first_name' => 'Domino',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '24 impasse des Champs Élysées',
                'city_id' => '8954',
                'role_id' => '2',
                'profession_id' => '18',
                'image' => 'Domino_Harvey_Chasseur-de-primes.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Lesouague',
                'first_name' => 'Lisa',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => 'Rue Licence',
                'city_id' => '5641',
                'role_id' => '2',
                'profession_id' => '18',
                'image' => 'Lisa_Lesouague_Chasseur-de-primes.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Sapin',
                'first_name' => 'Michelle',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => 'Rue de la Fin',
                'city_id' => '4521',
                'role_id' => '2',
                'profession_id' => '19',
                'image' => 'Michelle_Sapin_Oncologue.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Winston',
                'first_name' => 'James',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => 'Rue Licence',
                'city_id' => '5642',
                'role_id' => '2',
                'profession_id' => '19',
                'image' => 'James_Winston_Oncologue.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Folamour',
                'first_name' => 'Peter',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => 'Rue Cul-Briques',
                'city_id' => '22045',
                'role_id' => '2',
                'profession_id' => '19',
                'image' => 'Peter_Folamour_Oncologue.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Pala',
                'first_name' => 'Louann',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => 'SDF',
                'city_id' => '4219',
                'role_id' => '2',
                'profession_id' => '20',
                'image' => 'Louann_Pala_Lécheur-de-timbre.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Gibbs',
                'first_name' => 'Sergent',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '15 Rue de Bagdad',
                'city_id' => '14523',
                'role_id' => '2',
                'profession_id' => '21',
                'image' => 'Sergent_Gibbs_Taxidermiste.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Morvan',
                'first_name' => 'Steren',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '14 Rue VG',
                'city_id' => '19753',
                'role_id' => '2',
                'profession_id' => '21',
                'image' => 'Steren_Morvan_Taxidermiste.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'De la Bonne Idée',
                'first_name' => 'Jean-François',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '1 rue du mur',
                'city_id' => '29540',
                'role_id' => '2',
                'profession_id' => '22',
                'image' => 'Jean-François_De-la-Bonne-Idée_Mannequin-de-crash-test.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Le Tive',
                'first_name' => 'Damien',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '399 Avenue Patrick Sébastien',
                'city_id' => '539',
                'role_id' => '2',
                'profession_id' => '23',
                'image' => 'Damien_Le-Tive_Beauf-professionnel.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Le Breton',
                'first_name' => 'Helena',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '14 Rue VG',
                'city_id' => '235',
                'role_id' => '2',
                'profession_id' => '24',
                'image' => 'Helena_Le-Breton_Skipper.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Pouloupou',
                'first_name' => 'Maxime',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '27 rue des P\'tits C**s',
                'city_id' => '7835',
                'role_id' => '2',
                'profession_id' => '25',
                'image' => 'Maxime_Pouloupou_Nanipabulophile.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Lafleur',
                'first_name' => 'Jérémie',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'adresse' => '45 rue des vents bien violents',
                'city_id' => '21453',
                'role_id' => '2',
                'profession_id' => '26',
                'image' => 'Jérémie_Lafleur_Porno-phonographiste.jpg',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
        ]);

        DB::table('users')->insert([
            [
                'last_name' => 'Leclient',
                'first_name' => 'Dom',
                'email' => 'client@gmail.fr',
                'password' => bcrypt('1234'),
                'adresse' => '256 Boulevard Clientèle',
                'city_id' => '1263',
                'role_id' => '3',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Hasard',
                'first_name' => 'Jérôme',
                'email' => 'client2@gmail.fr',
                'password' => bcrypt('1234'),
                'adresse' => '23 Boulevard Clientèle',
                'city_id' => '30125',
                'role_id' => '3',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
            [
                'last_name' => 'Randôme',
                'first_name' => 'Laetitia',
                'email' => 'client3@gmail.fr',
                'password' => bcrypt('1234'),
                'adresse' => '94 Avenue des clients',
                'city_id' => '9464',
                'role_id' => '3',
                'email_verified_at' => Carbon::create('2000', '01', '01'),
                'phone_number' => '0601020304',
            ],
        ]);
    }
}
