<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
      // DB::table('admins')->insert([
      //   'name' => 'Administrador',
      //   'email' => 'japadm@hotmail.com',
      //   'password' => Hash::make('123456a'),
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Uramaki',
      //   'ingredientes' => 'Arroz, alga, salmão e cream cheese',
      //   'sabor' => 'Philadelphia',
      //   'preco' => '2.30',
      //   'img_produto' => 'uramaki_philadelphia.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Uramaki',
      //   'ingredientes' => 'Arroz, alga, peixe branco cebolinha e cream cheese',
      //   'sabor' => 'Colorado',
      //   'preco' => '2.10',
      //   'img_produto' => 'uramaki_colorado.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Uramaki',
      //   'ingredientes' => 'Arroz, alga, patê de atum e cream cheese',
      //   'sabor' => 'Tunamaki',
      //   'preco' => '2.10',
      //   'img_produto' => 'uramaki_tunamaki.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Uramaki',
      //   'ingredientes' => 'Arroz, alga, kani kama, manga e pepino',
      //   'sabor' => 'California',
      //   'preco' => '2.10',
      //   'img_produto' => 'uramaki_california.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Uramaki',
      //   'ingredientes' => 'Arroz, alga, pele de salmão grelhada e cream cheese',
      //   'sabor' => 'Salmão Skin',
      //   'preco' => '2.10',
      //   'img_produto' => 'uramaki_salmaoskin.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Uramaki',
      //   'ingredientes' => 'Arroz, alga, camarão empanado e cream cheese',
      //   'sabor' => 'Tiasu',
      //   'preco' => '2.30',
      //   'img_produto' => 'uramaki_tiasu.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Uramaki',
      //   'ingredientes' => 'Arroz, alga, salmão grelhado, cream cheese e molho de maracujá',
      //   'sabor' => 'Philadelphia Grill',
      //   'preco' => '2.10',
      //   'img_produto' => 'uramaki_philadelphiaGrill.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Uramaki',
      //   'ingredientes' => 'Arroz, alga, morango, goiabada e cream cheese',
      //   'sabor' => 'Romeu e Julieta',
      //   'preco' => '2.10',
      //   'img_produto' => 'uramaki_romeujulieta.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Uramaki',
      //   'ingredientes' => 'Arroz, alga, kani, cream cheese e crispy de batata doce',
      //   'sabor' => 'Kani Crispy',
      //   'preco' => '2.10',
      //   'img_produto' => 'uramaki_kanicrispy.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Uramaki',
      //   'ingredientes' => 'Arroz, alga, salmão, cream cheese e uma camada extra de salmão',
      //   'sabor' => 'Philadelphia Especial',
      //   'preco' => '2.30',
      //   'img_produto' => 'uramaki_philadelphiaespecial.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Uramaki',
      //   'ingredientes' => 'Arroz, alga, chocolate nestlé, calda de caramelo e amendoim granulado',
      //   'sabor' => 'Charge',
      //   'preco' => '2.10',
      //   'img_produto' => 'uramaki_charge.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Uramaki',
      //   'ingredientes' => 'Arroz, alga, chocolate nestlé, morango e calda de chocolate',
      //   'sabor' => 'Sensação',
      //   'preco' => '2.10',
      //   'img_produto' => 'uramaki_sensacao.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Uramaki',
      //   'ingredientes' => 'Arroz, alga, chocolate nestlé e coco ralado',
      //   'sabor' => 'Prestígio',
      //   'preco' => '2.10',
      //   'img_produto' => 'uramaki_prestigio.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Uramaki',
      //   'ingredientes' => 'Arroz, alga, nutella e leite ninho',
      //   'sabor' => 'Nutella',
      //   'preco' => '2.10',
      //   'img_produto' => 'uramaki_nutela.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Hossomaki',
      //   'ingredientes' => 'Arroz, arroz e atum',
      //   'sabor' => 'Atum',
      //   'preco' => '2.10',
      //   'img_produto' => 'hossomaki_atum.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Hossomaki',
      //   'ingredientes' => 'Arroz, arroz e kani',
      //   'sabor' => 'Kani',
      //   'preco' => '2.10',
      //   'img_produto' => 'hossomaki_kani.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Hossomaki',
      //   'ingredientes' => 'Arroz, arroz e camarão',
      //   'sabor' => 'Camarão',
      //   'preco' => '2.10',
      //   'img_produto' => 'hossomaki_camarao.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Hossomaki',
      //   'ingredientes' => 'Arroz, alga e salmão',
      //   'sabor' => 'Salmão',
      //   'preco' => '2.10',
      //   'img_produto' => 'hossomaki_salmao.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Hossomaki',
      //   'ingredientes' => 'Alga, arroz e peixe branco',
      //   'sabor' => 'Peixe Branco',
      //   'preco' => '2.10',
      //   'img_produto' => 'hossomaki_peixebranco.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Hossomaki',
      //   'ingredientes' => 'Alga, arroz e pepino',
      //   'sabor' => 'Pepino',
      //   'preco' => '2.10',
      //   'img_produto' => 'hossomaki_pepino.jpeg'
      // ]);
      //
      // DB::table('produtos')->insert([
      //   'nome' => 'Hossomaki',
      //   'ingredientes' => 'Alga, arroz e salmão',
      //   'sabor' => 'Hot Philadelphia',
      //   'preco' => '2.10',
      //   'img_produto' => 'hossomaki_hotpiladelphia.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Hossomaki',
      //   'ingredientes' => 'Alga, arroz e banana',
      //   'sabor' => 'Banana',
      //   'preco' => '2.10',
      //   'img_produto' => 'hossomaki_banana.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Hossomaki',
      //   'ingredientes' => 'Alga, arroz e goiabada',
      //   'sabor' => 'Goiabada',
      //   'preco' => '2.10',
      //   'img_produto' => 'hossomaki_goiabada.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Entrada',
      //   'ingredientes' => 'Atum com crosta de gergelim, com molho sweet chilli e pimenta  togarashi',
      //   'sabor' => 'Atum Gomayaki',
      //   'preco' => '2.10',
      //   'img_produto' => 'entrada_atumgoy.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Entrada',
      //   'ingredientes' => 'Atum selado com molho de ostra',
      //   'sabor' => 'Atum JAP Steack',
      //   'preco' => '2.10',
      //   'img_produto' => 'entrada_japstek.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Entrada',
      //   'ingredientes' => 'Massa recheada frita',
      //   'sabor' => 'Guioza',
      //   'preco' => '2.10',
      //   'img_produto' => 'entrada_guioza.jpeg'
      // ]);
      //
      // DB::table('produtos')->insert([
      //   'nome' => 'Entrada',
      //   'ingredientes' => 'Com molho de maçã ou molho de ostra',
      //   'sabor' => 'Carpaccio de Salmão',
      //   'preco' => '2.10',
      //   'img_produto' => 'entrada_carp.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Entrada',
      //   'ingredientes' => 'Recheados com legumes',
      //   'sabor' => 'Rolinho de Primavera',
      //   'preco' => '2.10',
      //   'img_produto' => 'entrada_rolinho.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Entrada',
      //   'ingredientes' => 'Recheado com salmão cremoso e cebolinha, empanados na farinha panko',
      //   'sabor' => 'Pastel JAP',
      //   'preco' => '2.10',
      //   'img_produto' => 'entrada_pjap.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Entrada',
      //   'ingredientes' => 'Peixe Branco, Salmão ou Misto',
      //   'sabor' => 'Cervice JAP',
      //   'preco' => '2.10',
      //   'img_produto' => 'entrada_service.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Entrada',
      //   'ingredientes' => 'Pepino em conversa',
      //   'sabor' => 'Sunomono',
      //   'preco' => '2.10',
      //   'img_produto' => 'entrada_pepino.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Temaki',
      //   'ingredientes' => 'Salmão',
      //   'sabor' => 'Salmão',
      //   'preco' => '2.10',
      //   'img_produto' => 'temaki_salmao.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Temaki',
      //   'ingredientes' => 'Salmão e cream cheese',
      //   'sabor' => 'Philadelphia',
      //   'preco' => '2.10',
      //   'img_produto' => 'temaki_p.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Temaki',
      //   'ingredientes' => 'Atum',
      //   'sabor' => 'Atum',
      //   'preco' => '2.10',
      //   'img_produto' => 'temaki_atum.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Temaki',
      //   'ingredientes' => 'Kani, manga e pepino',
      //   'sabor' => 'California',
      //   'preco' => '2.10',
      //   'img_produto' => 'temaki_cali.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Temaki',
      //   'ingredientes' => 'Pele de salmão grelhada',
      //   'sabor' => 'Skin',
      //   'preco' => '2.10',
      //   'img_produto' => 'temaki_skin.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Temaki',
      //   'ingredientes' => 'Peixe branco',
      //   'sabor' => 'De Peixe Branco',
      //   'preco' => '2.10',
      //   'img_produto' => 'temaki_pb.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Temaki',
      //   'ingredientes' => 'Camarão',
      //   'sabor' => 'De Camarão',
      //   'preco' => '2.10',
      //   'img_produto' => 'temaki_camarao.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Temaki',
      //   'ingredientes' => 'Salmão, molho de ostra, pimenta kimuchi, pimenta togarashi e gengibre',
      //   'sabor' => 'JAP',
      //   'preco' => '2.10',
      //   'img_produto' => 'temaki_jap.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Temaki',
      //   'ingredientes' => 'Todas as opções fritas',
      //   'sabor' => 'Hot',
      //   'preco' => '2.10',
      //   'img_produto' => 'temaki_hot.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Temaki',
      //   'ingredientes' => '',
      //   'sabor' => 'Sweet Chilli',
      //   'preco' => '2.10',
      //   'img_produto' => 'temaki_sc.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Temaki',
      //   'ingredientes' => '',
      //   'sabor' => 'Shitake',
      //   'preco' => '2.10',
      //   'img_produto' => 'temaki_sh.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Sashimi',
      //   'ingredientes' => 'Salmão',
      //   'sabor' => 'Salmão',
      //   'preco' => '2.10',
      //   'img_produto' => 'sas_salmao.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Sashimi',
      //   'ingredientes' => 'Peixe Branco',
      //   'sabor' => 'Peixe Branco',
      //   'preco' => '2.10',
      //   'img_produto' => 'sas_pb.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Sashimi',
      //   'ingredientes' => 'Atum',
      //   'sabor' => 'Atum',
      //   'preco' => '2.10',
      //   'img_produto' => 'sas_atum.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Niguiri',
      //   'ingredientes' => '',
      //   'sabor' => 'Kani',
      //   'preco' => '2.10',
      //   'img_produto' => 'niguiri_kani.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Niguiri',
      //   'ingredientes' => '',
      //   'sabor' => 'Atum',
      //   'preco' => '2.10',
      //   'img_produto' => 'niguiri_atum.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Niguiri',
      //   'ingredientes' => '',
      //   'sabor' => 'Salmão',
      //   'preco' => '2.10',
      //   'img_produto' => 'niguiri_salmao.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Niguiri',
      //   'ingredientes' => '',
      //   'sabor' => 'Peixe Branco',
      //   'preco' => '2.10',
      //   'img_produto' => 'niguiri_pb.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Niguiri',
      //   'ingredientes' => '',
      //   'sabor' => 'Salmão Skin',
      //   'preco' => '2.10',
      //   'img_produto' => 'niguiri_sk.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Niguiri',
      //   'ingredientes' => '',
      //   'sabor' => 'JOE',
      //   'preco' => '2.10',
      //   'img_produto' => 'niguiri_j.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Exclusivos',
      //   'ingredientes' => 'Salmão, shitake, cream cheese , envolto de salmão selado com couve frita',
      //   'sabor' => 'Gunkan',
      //   'preco' => '2.10',
      //   'img_produto' => 'niguiri_g.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Exclusivos',
      //   'ingredientes' => 'Lula ao molho de ostra envolto de salmão selado',
      //   'sabor' => 'Lula Jap Fusion',
      //   'preco' => '2.10',
      //   'img_produto' => 'niguiri_lj.jpeg'
      // ]);

      // DB::table('produtos')->insert([
      //   'nome' => 'Exclusivos',
      //   'ingredientes' => 'Camarão empanado na farinha panko, cream cheese envolto por salmão selado',
      //   'sabor' => 'Ebi Jap Fire',
      //   'preco' => '2.10',
      //   'img_produto' => 'niguiri_ejp.jpeg'
      // ]);
















    }
}
