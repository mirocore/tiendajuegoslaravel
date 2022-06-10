<?php

use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'id_producto' => 1,
            'nombre' => 'Fifa 20',
            'descripcion' => 'Gracias al motor Frostbite™, EA SPORTS™ FIFA 20 te muestra las dos caras del deporte rey: la prestigiosa competición profesional y el fútbol callejero más auténtico en la nueva experiencia EA SPORTS VOLTA. FIFA 20 innova en todos los aspectos con FOOTBALL INTELIGENCE, una plataforma con un nivel de realismo sin precedentes; FIFA Ultimate Team™, que te da aún más opciones para crear el equipo de tus sueños, y EA SPORTS VOLTA, que trae de vuelta los partidos a escala urbana.',
            'precio' => 5800,
            'stock' => 10,
            'estado' => 1,
            'imagen' => 'prod001.png',
            'id_consola' => 5,
            'id_categoria' => 2,
            'id_marca' => 1,
        ]);
        DB::table('productos_tienen_generos')->insert([
            'id_producto' => 1,
            'id_genero' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('productos')->insert([
            'id_producto' => 2,
            'nombre' => 'One Punch Man: A Hero nobody knows',
            'descripcion' => 'Experimenta el mundo de One Punch Man por ti mismo en "One Punch Man: ¡Un héroe que nadie conoce!" ¡Forma un equipo con tus héroes y villanos favoritos, incrementa tus técnicas y descubre quién termina reinando en el juego One Punch Man!',
            'precio' => 7000,
            'stock' => 15,
            'estado' => 1,
            'imagen' => 'prod002.png',
            'id_consola' => 5,
            'id_categoria' => 2,
            'id_marca' => 2,
        ]); 
        DB::table('productos_tienen_generos')->insert([
            'id_producto' => 2,
            'id_genero' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('productos_tienen_generos')->insert([
            'id_producto' => 2,
            'id_genero' => 8,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('productos')->insert([
            'id_producto' => 3,
            'nombre' => 'Fortnite Darkfire Bundle',
            'descripcion' => 'Abraza tu lado oscuro. El paquete más completo para Fortnite! Disponible Ya exclusivo en locales!',
            'precio' => 2800,
            'stock' => 0,
            'estado' => 0,
            'imagen' => 'prod003.png',
            'id_consola' => 1,
            'id_categoria' => 2,
            'id_marca' => 3,
        ]);
        DB::table('productos_tienen_generos')->insert([
            'id_producto' => 3,
            'id_genero' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('productos')->insert([
            'id_producto' => 4,
            'nombre' => 'Street Fighter V',
            'descripcion' => 'La legendaria franquicia de lucha vuelve con tecnología de Unreal Engine 4',
            'precio' => 2000,
            'stock' => 6,
            'estado' => 1,
            'imagen' => 'prod004.png',
            'id_consola' => 1,
            'id_categoria' => 2,
            'id_marca' => 4,
        ]);
        DB::table('productos_tienen_generos')->insert([
            'id_producto' => 4,
            'id_genero' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('productos_tienen_generos')->insert([
            'id_producto' => 4,
            'id_genero' => 8,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('productos')->insert([
            'id_producto' => 5,
            'nombre' => 'Dragon Z Kakarot',
            'descripcion' => '¡Experimenta, por primera vez, la historia de DRAGON BALL Z desde eventos épicos hasta diversas misiones secundarias, que incluyen momentos de la historia nunca antes vistos que responden a algunas preguntas emocionantes de la historia de DRAGON BALL! 
Juega por medio de las peleas simbólicas de DRAGON BALL Z a una escala como ninguna otra. Lucha en vastos campos de batalla con entornos destructibles y experimenta épicas batallas de jefes que pondrán a prueba los límites de tus habilidades de combate. ¡Aumenta tu nivel de potencia y supera el desafío! 
No pelees simplemente como Goku. Vive la experiencia como Goku. Pesca, vuela, entrena y pelea a través de las sagas de DRAGON BALL Z, entablando amistades con un amplio elenco de personajes de DRAGON BALL. ',
            'precio' => 6200,
            'stock' => 20,
            'estado' => 0,
            'imagen' => 'prod005.png',
            'id_consola' => 1,
            'id_categoria' => 2,
            'id_marca' => 2,
        ]);
        DB::table('productos_tienen_generos')->insert([
            'id_producto' => 5,
            'id_genero' => 8,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('productos_tienen_generos')->insert([
            'id_producto' => 5,
            'id_genero' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('productos')->insert([
            'id_producto' => 6,
            'nombre' => 'Grand Theft Auto: San Andreas',
            'descripcion' => 'Hace cinco años, Carl Johnson escapó de las presiones de la vida en Los Santos, un barrio de San Andreas. Esta ciudad desgarrada por problemas de pandillas, drogas y llena de corrupción. Dónde las estrellas de cine y los millonarios hacen todo lo posible para evitar a los camellos y los pandilleros.',
            'precio' => 1650,
            'stock' => 5,
            'estado' => 1,
            'imagen' => 'prod006.png',
            'id_consola' => 2,
            'id_categoria' => 2,
            'id_marca' => 5,
        ]);
        DB::table('productos_tienen_generos')->insert([
            'id_producto' => 6,
            'id_genero' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('productos')->insert([
            'id_producto' => 7,
            'nombre' => 'Happy Feet Two',
            'descripcion' => 'Divertidísima aventura musical que , mediante el controlador,da vida al maravilloso paisaje de la Antártida.',
            'precio' => 1100,
            'stock' => 1,
            'estado' => 1,
            'imagen' => 'prod007.png',
            'id_consola' => 6,
            'id_categoria' => 2,
            'id_marca' => 6,
        ]);
        DB::table('productos_tienen_generos')->insert([
            'id_producto' => 7,
            'id_genero' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('productos')->insert([
            'id_producto' => 8,
            'nombre' => 'Pokemon Sword',
            'descripcion' => 'En Galar hay una enorme explanada conocida como el Área Silvestre. Se trata de una zona rebosante de naturaleza que conecta diferentes pueblos y ciudades de la región y donde, además, se encuentra la mayor variedad de Pokémon de todo Galar. 
Los Pokémon que encuentres dependerán del tiempo atmosférico y del lugar concreto en el que estés, ¡así que es posible que te topes con nuevas especies cada vez que la visites! ',
            'precio' => 5800,
            'stock' => 10,
            'estado' => 1,
            'imagen' => 'prod008.png',
            'id_consola' => 3,
            'id_categoria' => 2,
            'id_marca' => 7,
        ]);
        DB::table('productos_tienen_generos')->insert([
            'id_producto' => 8,
            'id_genero' => 6,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('productos_tienen_generos')->insert([
            'id_producto' => 8,
            'id_genero' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('productos')->insert([
            'id_producto' => 9,
            'nombre' => 'Super Mario Make 2',
            'descripcion' => '¡Rompe las reglas y crea los niveles de Super Mario con los que siempre has soñado en Super Mario Maker 2, disponible en exclusiva para Nintendo Switch! Utiliza el amplio abanico de nuevas herramientas, funciones y elementos de niveles, dale rienda suelta a tu imaginación y crea niveles únicos que podrás compartir con amigos y jugadores de todo el mundo. ',
            'precio' => 5800,
            'stock' => 10,
            'estado' => 1,
            'imagen' => 'prod009.png',
            'id_consola' => 3,
            'id_categoria' => 2,
            'id_marca' => 7,
        ]);
        DB::table('productos_tienen_generos')->insert([
            'id_producto' => 9,
            'id_genero' => 7,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('productos_tienen_generos')->insert([
            'id_producto' => 9,
            'id_genero' => 5,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
DB::table('productos')->insert([
            'id_producto' => 10,
            'nombre' => 'The Legend of Zelda: Link´s Awakening',
            'descripcion' => 'Han pasado 26 años desde que The Legend of Zelda: Links Awakening saliera a la venta para Game Boy; ahora llega a Nintendo Switch como una aventura renovada.

Por culpa de una terrible tormenta, Link naufraga y acaba llegando a la costa de la misteriosa Isla Koholint. Si quiere regresar a casa, el valiente héroe deberá superar mazmorras desafiantes y enfrentarse a monstruos espeluznantes.

Esta nueva versión incluye muchos de los elementos únicos que aparecían en el juego original para Game Boy: secciones de plataformas en 2D, cameos de algunos personajes que no pertenecen a la serie de The Legend of Zelda, y mucho más.

A medida que completes las mazmorras de la historia principal, conseguirás salas (piedras salizas) que podrás colocar a tu gusto para organizar mazmorras de salas. Coloca la entrada de la mazmorra, la guarida del jefe y muchas otras mientras recorres la nueva mazmorra e intentas completar los objetivos.

Escanea amiibo compatibles de la serie The Legend of Zelda (a la venta por separado) para conseguir más piedras salizas. También podrás encontrar más de ellas en minijuegos puestos al día, como la ruta de los rápidos, la sala de juegos y la pesca.',
            'precio' => 5800,
            'stock' => 10,
            'estado' => 1,
            'imagen' => 'prod010.png',
            'id_consola' => 3,
            'id_categoria' => 2,
            'id_marca' => 7,
        ]);
        DB::table('productos_tienen_generos')->insert([
            'id_producto' => 10,
            'id_genero' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('productos_tienen_generos')->insert([
            'id_producto' => 10,
            'id_genero' => 6,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('productos')->insert([
            'id_producto' => 11,
            'nombre' => 'Mario Kart 7',
            'descripcion' => 'Una nueva dimensión ha llegado a las carreras Kart. La nueva entrega de la franquicia tiene todo lo que más le gusta a los fans. La diversión de las carreras en el Reino Hongo ahora en glorioso 3D sin necesidad de gafas especiales. Por primera vez, los conductores podrán explorar nuevas posibilidades de competencia de karts, como surcar el cielo o sumergirse en las profundidades del mar. Nuevas pistas, nuevas habilidades y nuevos karts personalizables para llevar la emoción de carreras a nuevas alturas.',
            'precio' => 2900,
            'stock' => 10,
            'estado' => 1,
            'imagen' => 'prod011.png',
            'id_consola' => 7,
            'id_categoria' => 2,
            'id_marca' => 7,
        ]);
        DB::table('productos_tienen_generos')->insert([
            'id_producto' => 11,
            'id_genero' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('productos')->insert([
            'id_producto' => 12,
            'nombre' => 'Fire Emblem Warriors',
            'descripcion' => 'Metete en la piel de Marth, Xander, Corrin y otros héroes de Fire Emblem y desata poderes y poderosos ataques al más puro estilo Dinasty Warriors. Toma el control de personajes originales de Fire Emblem, da órdenes durante la batalla, combina héroes para que ejecuten alucinante ataques, y muchas cosas más. Desbloquea nuevos héroes, cada uno con sus propios movimientos únicos, ataques especiales, tipos de armas y diálogos hablados en este juego de acción a gran escala de los creadores de Hyrule Warriors.',
            'precio' => 4200,
            'stock' => 10,
            'estado' => 1,
            'imagen' => 'prod012.png',
            'id_consola' => 7,
            'id_categoria' => 2,
            'id_marca' => 7,
        ]);
        DB::table('productos_tienen_generos')->insert([
            'id_producto' => 12,
            'id_genero' => 5,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('productos_tienen_generos')->insert([
            'id_producto' => 12,
            'id_genero' => 6,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('productos')->insert([
            'id_producto' => 13,
            'nombre' => 'Sony PlayStation 4 Slim 1TB',
            'descripcion' => '¡Conoce la nueva PS4 modelo SLIM, disfruta de una PS4 más estilizada y compacta con la misma potencia de juego! Ofrecemos 12 meses de garantía escrita.',
            'precio' => 36499,
            'stock' => 5,
            'estado' => 1,
            'imagen' => 'prod013.png',
            'id_consola' => 1,
            'id_categoria' => 1,
            'id_marca' => 8,
        ]);
        DB::table('productos')->insert([
            'id_producto' => 14,
            'nombre' => 'Consola Retro Gaming NES 500 Juegos',
            'descripcion' => 'Consola de juegos Coolbaby simil "NES" versión estadounidense y europea (NTSC/PAL) con 500 juegos incorporados.
La consola clásica de 500 juegos retro te permite volver a jugar todos tus juegos favoritos en la TV.
Dos controles: cuatro manijas clave, fáciles de operar, adecuadas para juegos de acción.
Consola de juegos de entretenimiento en casa, muy buenos regalos para amigos, familiares.
Contenido del paquete: 1x consola, 1 x manual, 1 x enchufe de alimentación, 2 x controles',
            'precio' => 3574,
            'stock' => 5,
            'estado' => 0,
            'imagen' => 'prod014.png',
            'id_consola' => 10,
            'id_categoria' => 1,
            'id_marca' => 7,
        ]);
        DB::table('productos')->insert([
            'id_producto' => 15,
            'nombre' => 'Control Sony Dualshock 4 - Titanium Blue',
            'descripcion' => 'Renueva tu equipo de juego con nuestra nueva edición especial de DUALSHOCK 4. Color Titanium Blue',
            'precio' => 6299,
            'stock' => 0,
            'estado' => 0,
            'imagen' => 'prod015.png',
            'id_consola' => 1,
            'id_categoria' => 3,
            'id_marca' => 8,
        ]);
        DB::table('productos')->insert([
            'id_producto' => 16,
            'nombre' => 'Control Sony Dualshock 4 - Red Camo',
            'descripcion' => 'El control inalámbrico DualShock4 para la consola PlayStation 4 define esta generación de juego al combinar funciones revolucionarias y comodidad con controles intuitivos y de precisión. La evolución de los joysticks analógicos y los botones de gatillo permite disfrutar de una exactitud sin precedentes con cada movimiento. A su vez, las tecnologías innovadoras ofrecen formas emocionantes de vivir la experiencia de tus juegos y compartir tus mejores momentos.',
            'precio' => 6299,
            'stock' => 10,
            'estado' => 1,
            'imagen' => 'prod016.png',
            'id_consola' => 1,
            'id_categoria' => 3,
            'id_marca' => 8,
        ]);
        DB::table('productos')->insert([
            'id_producto' => 17,
            'nombre' => 'Control Sony Dualshock 4 - Copper',
            'descripcion' => 'Toma el control de una nueva generación de videojuegos con un mando inalámbrico DualShock 4 V2 Cobre, que pone en tus manos la mayor precisión en tus juegos de PlayStation 4. Con un panel táctil nuevo que revela desde arriba la barra luminosa y un elegante acabado mate, es la forma más ergonómicas e intuitiva de jugar que haya habido nunca.',
            'precio' => 6000,
            'stock' => 20,
            'estado' => 1,
            'imagen' => 'prod017.png',
            'id_consola' => 1,
            'id_categoria' => 3,
            'id_marca' => 8,
        ]);
    }
}
