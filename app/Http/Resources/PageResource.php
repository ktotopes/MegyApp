<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->data['title'],
            'banner_1' => [
                'title' => $this->data['title_banner_1'],
                'text' => $this->data['text_banner_1'],
                'image' => $this->bg_image_banner_1,
                'qr_code' => $this->qr_code_image_banner_1,
                'countPagesText' => $this->data['countPagesText_banner_1'],
                'button' => $this->data['button_banner_1'],
            ],
            'video_review' => [
                'title' => $this->data['title_video_review_2'],
                'image' => $this->image_video_review_2,
            ],
            'description' => [
                'title' => $this->data['title_description_2'],
                'text' => $this->data['text_description_2'],
                'image_1' => $this->image_description_3,
                'title_1' => $this->data['title_description_3'],
                'description_1' => $this->data['description_3'],
                'image_2' => $this->image_description_4,
                'title_2' => $this->data['title_description_4'],
                'description_2' => $this->data['description_4'],
                'image_3' => $this->image_description_5,
                'title_3' => $this->data['title_description_5'],
                'description_3' => $this->data['description_5'],
                'image_4' => $this->image_description_6,
                'title_4' => $this->data['title_description_6'],
                'description_4' => $this->data['description_6'],
            ],
            'banner_2' => [
                'title' => $this->data['title_banner_2_1'],
                'image' => $this->image_banner_2_1,
                'qr_code' => $this->qr_code_banner_1_1,
                'text_1' => $this->data['text_banner_3_1'],
                'text_2' => $this->data['text_banner_4_1'],
                'text_3' => $this->data['text_banner_5_1'],
                'text_4' => $this->data['text_banner_6_1'],
            ],
            'banner_3' => [
                'title' => $this->data['title_banner_3_1'],
                'image_1' => $this->image_banner_3_1,
                'qr_code' => $this->qr_code_banner_2_1,
                'text_1' => $this->data['text_banner_1_1'],
                'image_2' => $this->image_banner_1_1,
                'text_2' => $this->data['text_banner_2_2'],
                'image_3' => $this->image_banner_2_2,
                'text_3' => $this->data['text_banner_3_3'],
                'image_4' => $this->image_banner_3_3,
            ],
            'rating_title' => $this->data['rating_title_1'],
            'rating_text' => $this->data['rating_text_1'],
            'company_title' => $this->data['company_title_1'],
            'company_text' => $this->data['company_text_1'],
            'title_ceo' => $this->data['title_ceo'],
            'description_ceo' => $this->data['description_ceo'],
            'h1_ceo' => $this->data['h1_ceo'],
        ];
    }
}

//$data = [
//    'title' => 'OMERU',
//    'title_banner_1' => 'Уникальный QR-код на памятник',
//    'text_banner_1' => 'Современный  способ сохранить память об умершем человеке — это QR-код на его могиле. Позвольте каждому, кто посещает место захоронения, легко узнать историю и важные моменты жизни покойного, создавая уникальную связь между прошлым и настоящим.',
//    'bg_image_banner_1' => '',
//    'qr_code_image_banner_1' => '',
//    'countPages_banner_1' => '',
//    'countPagesText_banner_1' => 'страницы уже зарегистрированы',
//    'button_banner_1' => 'Узнать больше о коде',
//
//    'title_video_review_2' => 'Посмотрите наш видеообзор',
//    'image_video_review_2' => '',
//
//    'title_description_2' => 'Мемориальная страница',
//    'text_description_2' => 'Электронная страница памяти посвящена наследию ушедшего человека. Она откроется после наведения смартфона на QR-код. Вы можете разместить на ней любую информацию, имеющую значение для вас. Этот виртуальный мемориал будет доступен в любое время, а данные надежно защищены.',
//
//    'image_description_3' => '',
//    'title_description_3' => 'Фото и видеоархив',
//    'description_3' => 'Жизненный путь в фотографиях, аудио- и видеозаписях: успехи, приключения, семейные встречи.',
//
//    'image_description_4' => '',
//    'title_description_4' => 'Биография',
//    'description_4' => 'Текстовая хроника жизни будет отражать воспоминания о человеке для близких и друзей в словах.',
//
//    'image_description_5' => '',
//    'title_description_5' => 'Ссылки в сети',
//    'description_5' => 'Присутствие в интернете — аккаунты в социальных сетях, каналы и другие площадки, где человек оставил свой след.',
//
//    'image_description_6' => '',
//    'title_description_6' => 'Расположение',
//    'description_6' => 'Метка с координатами, которая поможет другим легко найти место захоронения вашего близкого.',
//
//    'title_banner_2_1' => 'Это действительно просто!',
//    'image_banner_2_1' => '',
//    'qr_code_banner_1_1' => '',
//    'text_banner_3_1' => 'Сделайте заказ любым удобным для вас способом:',
//    'text_banner_4_1' => 'Получите код и авторизуйтесь на сайте, чтобы получить доступ к редактированию страницы',
//    'text_banner_5_1' => 'Разместите информацию о покойном и выберите подходящее оформление',
//    'text_banner_6_1' => 'Прикрепите табличку с QR-кодом на памятнике, чтобы посетители могли считать код и почтить память ушедшего',
//
//    'title_banner_3_1' => 'Как работает наш QR-код?',
//    'image_banner_3_1' => '',
//    'qr_code_banner_2_1' => '',
//    'text_banner_1_1' => 'Приклейте QR-кодна надгробие',
//    'image_banner_1_1' => '',
//    'text_banner_2_2' => 'Отсканируйте код и посетите страницу памяти',
//    'image_banner_2_2' => '',
//    'text_banner_3_3' => 'Вспомните моменты жизни вашего  близкого человека',
//    'image_banner_3_3' => '',
//
//    'rating_title_1' => 'Высокая оценка продукта',
//    'rating_text_1' => 'Покупатели ценят QR-коды на памятниках как уникальный способ сохранить память о близких. Отзывы подтверждают, что это решение помогает делиться жизненными историями ушедших, принося утешение родственникам.',
//    'phone_1' => '8 800 323 44 33',
//    'email_1' => 'info@qrnasledie.ru',
//    'company_title_1' => 'О КОМПАНИИ',
//    'company_text_1' => 'Мы превращаем вечную память о любимых людях в цифровой формат с помощью QR-кодов на надгробии. Наша миссия – сделать воспоминания о близких вечно живыми и доступными.',
//];

//$data = [
//    'title' => 'OMERU',
//    'banner_1' => [
//        'title' => 'Уникальный QR-код на памятник',
//        'text' => 'Современный  способ сохранить память об умершем человеке — это QR-код на его могиле. Позвольте каждому, кто посещает место захоронения, легко узнать историю и важные моменты жизни покойного, создавая уникальную связь между прошлым и настоящим.',
//        'image' => '',
//        'countPages' => '',
//        'countPagesText' => 'страницы уже зарегистрированы',
//        'button' => 'Узнать больше о коде',
//    ],
//    'video_review' => [
//        'title' => 'Посмотрите наш видеообзор',
//        'image' => '',
//    ],
//    'description' => [
//        'title' => 'Мемориальная страница',
//        'text' => 'Электронная страница памяти посвящена наследию ушедшего человека. Она откроется после наведения смартфона на QR-код. Вы можете разместить на ней любую информацию, имеющую значение для вас. Этот виртуальный мемориал будет доступен в любое время, а данные надежно защищены.',
//        'image_1' => '',
//        'title_1' => 'Фото и видеоархив',
//        'description_1' => 'Жизненный путь в фотографиях, аудио- и видеозаписях: успехи, приключения, семейные встречи.',
//        'image_2' => '',
//        'title_2' => 'Биография',
//        'description_2' => 'Текстовая хроника жизни будет отражать воспоминания о человеке для близких и друзей в словах.',
//        'image_3' => '',
//        'title_3' => 'Ссылки в сети',
//        'description_3' => 'Присутствие в интернете — аккаунты в социальных сетях, каналы и другие площадки, где человек оставил свой след.',
//        'image_4' => '',
//        'title_4' => 'Расположение',
//        'description_4' => 'Метка с координатами, которая поможет другим легко найти место захоронения вашего близкого.',
//    ],
//    'banner_2' => [
//        'title' => 'Это действительно просто!',
//        'image' => '',
//        'qr_code' => '',
//        'text_1' => 'Сделайте заказ любым удобным для вас способом:',
//        'text_2' => 'Получите код и авторизуйтесь на сайте, чтобы получить доступ к редактированию страницы',
//        'text_3' => 'Разместите информацию о покойном и выберите подходящее оформление',
//        'text_4' => 'Прикрепите табличку с QR-кодом на памятнике, чтобы посетители могли считать код и почтить память ушедшего',
//    ],
//    'banner_3' => [
//        'title' => 'Как работает наш QR-код?',
//        'image_1' => '',
//        'qr_code' => '',
//        'text_1' => 'Приклейте QR-кодна надгробие',
//        'image_2' => '',
//        'text_2' => 'Отсканируйте код и посетите страницу памяти',
//        'image_3' => '',
//        'text_3' => 'Вспомните моменты жизни вашего  близкого человека',
//    ],
//    'rating_title' => 'Высокая оценка продукта',
//    'rating_text' => 'Покупатели ценят QR-коды на памятниках как уникальный способ сохранить память о близких. Отзывы подтверждают, что это решение помогает делиться жизненными историями ушедших, принося утешение родственникам.',
//    'phone' => '8 800 323 44 33',
//    'email' => 'info@qrnasledie.ru',
//    'company_title' => 'О КОМПАНИИ',
//    'company_text' => 'Мы превращаем вечную память о любимых людях в цифровой формат с помощью QR-кодов на надгробии. Наша миссия – сделать воспоминания о близких вечно живыми и доступными.',
//];
