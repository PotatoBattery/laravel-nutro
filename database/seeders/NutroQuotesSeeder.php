<?php

namespace Database\Seeders;

use App\Models\Nutro\NutroQuotes;
use Illuminate\Database\Seeder;

class NutroQuotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quotes = [
            ['locale' => 'ru', 'quote' => 'Что разум человека может постигнуть и во что он может поверить, того он способен достичь'],
            ['locale' => 'ru', 'quote' => 'Стремитесь не к успеху, а к ценностям, которые он дает'],
            ['locale' => 'ru', 'quote' => 'Своим успехом я обязана тому, что никогда не оправдывалась и не принимала оправданий от других'],
            ['locale' => 'ru', 'quote' => 'Сложнее всего начать действовать, все остальное зависит только от упорства'],
            ['locale' => 'ru', 'quote' => 'Надо любить жизнь больше, чем смысл жизни'],
            ['locale' => 'ru', 'quote' => 'Жизнь - это то, что с тобой происходит, пока ты строишь планы'],
            ['locale' => 'ru', 'quote' => 'Логика может привести Вас от пункта А к пункту Б, а воображение — куда угодно'],
            ['locale' => 'ru', 'quote' => 'Начинать всегда стоит с того, что сеет сомнения'],
            ['locale' => 'ru', 'quote' => 'Настоящая ответственность бывает только личной'],
            ['locale' => 'ru', 'quote' => 'Неосмысленная жизнь не стоит того, чтобы жить'],
            ['locale' => 'ru', 'quote' => '80% успеха - это появиться в нужном месте в нужное время'],
            ['locale' => 'ru', 'quote' => 'Ваше время ограничено, не тратьте его, живя чужой жизнью'],
            ['locale' => 'ru', 'quote' => 'Победа - это еще не все, все - это постоянное желание побеждать'],
            ['locale' => 'ru', 'quote' => 'Вы никогда не пересечете океан, если не наберетесь мужества потерять берег из виду'],
            ['locale' => 'ru', 'quote' => 'Свобода ничего не стоит, если она не включает в себя свободу ошибаться'],
            ['locale' => 'en', 'quote' => 'Never look back'],
            ['locale' => 'en', 'quote' => 'A life is a moment'],
            ['locale' => 'en', 'quote' => 'Work hard. Dream big'],
            ['locale' => 'en', 'quote' => 'Money often costs too much'],
            ['locale' => 'en', 'quote' => 'Do something with passion or not it all '],
            ['locale' => 'en', 'quote' => 'Only my dream keeps me alive'],
            ['locale' => 'en', 'quote' => 'It`s better to have ideals and dreams than nothing'],
            ['locale' => 'en', 'quote' => 'The memory warms you up inside, but it also breaks your soul apart'],
            ['locale' => 'en', 'quote' => 'Stretching his hand out to catch the stars, he forgets the flowers at his feet'],
            ['locale' => 'en', 'quote' => 'Memories take us back, dreams take us forward'],
            ['locale' => 'en', 'quote' => 'Remember that the most dangerous prison is the one in your head'],
            ['locale' => 'en', 'quote' => 'Life is a one time offer, use it well'],
            ['locale' => 'en', 'quote' => 'Life is short. Smile while you still have teeth'],
            ['locale' => 'en', 'quote' => 'Life is beautiful. Enjoy the ride'],
            ['locale' => 'en', 'quote' => 'The best thing in our life is love'],
        ];
        NutroQuotes::insert($quotes);
    }
}
