<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validācijas valodu līnijas
    |--------------------------------------------------------------------------
    |
    | Šīs valodu līnijas satur noklusējuma kļūdu ziņojumus, ko izmanto
    | validatora klase. Dažiem no šiem noteikumiem ir vairākas versijas, piemēram,
    | lieluma noteikumi. Jūtieties brīvi pielāgot katru no šiem ziņojumiem šeit.
    |
    */

    'accepted' => 'Laukam :attribute jābūt pieņemtam.',
    'accepted_if' => 'Laukam :attribute jābūt pieņemtam, kad :other ir :value.',
    'active_url' => 'Lauks :attribute nav derīga URL adrese.',
    'after' => 'Laukam :attribute jābūt datumam pēc :date.',
    'after_or_equal' => 'Laukam :attribute jābūt datumam pēc vai vienādam ar :date.',
    'alpha' => 'Lauks :attribute drīkst saturēt tikai burtus.',
    'alpha_dash' => 'Lauks :attribute drīkst saturēt tikai burtus, ciparus, domuzīmes un pasvītras.',
    'alpha_num' => 'Lauks :attribute drīkst saturēt tikai burtus un ciparus.',
    'array' => 'Lauks :attribute jābūt masīvam.',
    'ascii' => 'Lauks :attribute drīkst saturēt tikai vienbaita burtciparu rakstzīmes un simbolus.',
    'before' => 'Laukam :attribute jābūt datumam pirms :date.',
    'before_or_equal' => 'Laukam :attribute jābūt datumam pirms vai vienādam ar :date.',
    'between' => [
        'array' => 'Laukam :attribute jābūt no :min līdz :max vienumiem.',
        'file' => 'Lauka :attribute izmēram jābūt no :min līdz :max kilobaitiem.',
        'numeric' => 'Laukam :attribute jābūt starp :min un :max.',
        'string' => 'Lauka :attribute garumam jābūt no :min līdz :max rakstzīmēm.',
    ],
    'boolean' => 'Laukam :attribute jābūt patiesam vai nepatiesam.',
    'can' => 'Lauks :attribute satur neatļautu vērtību.',
    'confirmed' => 'Lauka :attribute apstiprinājums nesakrīt.',
    'contains' => 'Laukam :attribute trūkst nepieciešamās vērtības.',
    'current_password' => 'Parole ir nepareiza.',
    'date' => 'Lauks :attribute nav derīgs datums.',
    'date_equals' => 'Laukam :attribute jābūt datumam, kas vienāds ar :date.',
    'date_format' => 'Lauks :attribute neatbilst formātam :format.',
    'decimal' => 'Laukam :attribute jābūt ar :decimal decimālzīmēm.',
    'declined' => 'Laukam :attribute jābūt noraidītam.',
    'declined_if' => 'Laukam :attribute jābūt noraidītam, kad :other ir :value.',
    'different' => 'Laukiem :attribute un :other jābūt atšķirīgiem.',
    'digits' => 'Laukam :attribute jābūt :digits cipariem.',
    'digits_between' => 'Laukam :attribute jābūt starp :min un :max cipariem.',
    'dimensions' => 'Laukam :attribute ir nederīgi attēla izmēri.',
    'distinct' => 'Laukam :attribute ir dublikāta vērtība.',
    'doesnt_end_with' => 'Lauks :attribute nedrīkst beigties ar vienu no šiem: :values.',
    'doesnt_start_with' => 'Lauks :attribute nedrīkst sākties ar vienu no šiem: :values.',
    'email' => 'Laukam :attribute jābūt derīgai e-pasta adresei.',
    'ends_with' => 'Lauks :attribute jāpabeidz ar vienu no šiem: :values.',
    'enum' => 'Izvēlētais :attribute ir nederīgs.',
    'exists' => 'Izvēlētais :attribute ir nederīgs.',
    'extensions' => 'Laukam :attribute jābūt failam ar vienu no šīm paplašinājumiem: :values.',
    'file' => 'Laukam :attribute jābūt failam.',
    'filled' => 'Laukam :attribute jābūt aizpildītam.',
    'gt' => [
        'array' => 'Laukam :attribute jābūt vairāk nekā :value vienumiem.',
        'file' => 'Laukam :attribute jābūt lielākam par :value kilobaitiem.',
        'numeric' => 'Laukam :attribute jābūt lielākam par :value.',
        'string' => 'Laukam :attribute jābūt garākam par :value rakstzīmēm.',
    ],
    'gte' => [
        'array' => 'Laukam :attribute jābūt :value vienumiem vai vairāk.',
        'file' => 'Laukam :attribute jābūt lielākam vai vienādam ar :value kilobaitiem.',
        'numeric' => 'Laukam :attribute jābūt lielākam vai vienādam ar :value.',
        'string' => 'Laukam :attribute jābūt garākam vai vienādam ar :value rakstzīmēm.',
    ],
    'hex_color' => 'Laukam :attribute jābūt derīgai heksadecimālai krāsai.',
    'image' => 'Laukam :attribute jābūt attēlam.',
    'in' => 'Izvēlētais :attribute ir nederīgs.',
    'in_array' => 'Laukam :attribute jābūt klāt :other.',
    'integer' => 'Laukam :attribute jābūt veselam skaitlim.',
    'ip' => 'Laukam :attribute jābūt derīgai IP adresei.',
    'ipv4' => 'Laukam :attribute jābūt derīgai IPv4 adresei.',
    'ipv6' => 'Laukam :attribute jābūt derīgai IPv6 adresei.',
    'json' => 'Laukam :attribute jābūt derīgai JSON virknei.',
    'list' => 'Laukam :attribute jābūt sarakstam.',
    'lowercase' => 'Laukam :attribute jābūt mazajiem burtiem.',
    'lt' => [
        'array' => 'Laukam :attribute jābūt mazāk nekā :value vienumiem.',
        'file' => 'Laukam :attribute jābūt mazākam par :value kilobaitiem.',
        'numeric' => 'Laukam :attribute jābūt mazākam par :value.',
        'string' => 'Laukam :attribute jābūt īsākam par :value rakstzīmēm.',
    ],
    'lte' => [
        'array' => 'Laukam :attribute nedrīkst būt vairāk nekā :value vienumu.',
        'file' => 'Laukam :attribute jābūt mazākam vai vienādam ar :value kilobaitiem.',
        'numeric' => 'Laukam :attribute jābūt mazākam vai vienādam ar :value.',
        'string' => 'Laukam :attribute jābūt īsākam vai vienādam ar :value rakstzīmēm.',
    ],
    'mac_address' => 'Laukam :attribute jābūt derīgai MAC adresei.',
    'max' => [
        'array' => 'Laukam :attribute nedrīkst būt vairāk nekā :max vienumu.',
        'file' => 'Laukam :attribute nedrīkst būt lielākam par :max kilobaitiem.',
        'numeric' => 'Laukam :attribute nedrīkst būt lielākam par :max.',
        'string' => 'Laukam :attribute nedrīkst būt garākam par :max rakstzīmēm.',
    ],
    'max_digits' => 'Laukam :attribute nedrīkst būt vairāk nekā :max cipari.',
    'mimes' => 'Laukam :attribute jābūt failam ar tipu: :values.',
    'mimetypes' => 'Laukam :attribute jābūt failam ar tipu: :values.',
    'min' => [
        'array' => 'Laukam :attribute jābūt vismaz :min vienumiem.',
        'file' => 'Laukam :attribute jābūt vismaz :min kilobaitiem.',
        'numeric' => 'Laukam :attribute jābūt vismaz :min.',
        'string' => 'Laukam :attribute jābūt vismaz :min rakstzīmēm.',
    ],
    'min_digits' => 'Laukam :attribute jābūt vismaz :min cipariem.',
    'missing' => 'Laukam :attribute ir jābūt trūkstošam.',
    'missing_if' => 'Laukam :attribute ir jābūt trūkstošam, kad :other ir :value.',
    'missing_unless' => 'Laukam :attribute ir jābūt trūkstošam, ja vien :other nav :value.',
    'missing_with' => 'Laukam :attribute ir jābūt trūkstošam, kad ir klāt :values.',
    'missing_with_all' => 'Laukam :attribute ir jābūt trūkstošam, kad ir klāt :values.',
    'multiple_of' => 'Laukam :attribute jābūt :value reizinājumam.',
    'not_in' => 'Izvēlētais :attribute ir nederīgs.',
    'not_regex' => 'Lauka :attribute formāts ir nederīgs.',
    'numeric' => 'Laukam :attribute jābūt skaitlim.',
    'password' => [
        'letters' => 'Laukam :attribute jāietver vismaz viens burts.',
        'mixed' => 'Laukam :attribute jāietver vismaz viens lielais un viens mazais burts.',
        'numbers' => 'Laukam :attribute jāietver vismaz viens cipars.',
        'symbols' => 'Laukam :attribute jāietver vismaz viens simbols.',
        'uncompromised' => 'Dotā :attribute ir parādījusies datu noplūdē. Lūdzu, izvēlieties citu :attribute.',
    ],
    'present' => 'Laukam :attribute jābūt klāt.',
    'present_if' => 'Laukam :attribute jābūt klāt, kad :other ir :value.',
    'present_unless' => 'Laukam :attribute jābūt klāt, ja vien :other nav :value.',
    'present_with' => 'Laukam :attribute jābūt klāt, kad ir klāt :values.',
    'present_with_all' => 'Laukam :attribute jābūt klāt, kad ir klāt :values.',
    'prohibited' => 'Lauks :attribute ir aizliegts.',
    'prohibited_if' => 'Lauks :attribute ir aizliegts, kad :other ir :value.',
    'prohibited_unless' => 'Lauks :attribute ir aizliegts, ja vien :other nav :values.',
    'prohibits' => 'Lauks :attribute aizliedz :other klātbūtni.',
    'regex' => 'Lauka :attribute formāts ir nederīgs.',
    'required' => 'Lauks :attribute ir obligāts.',
    'required_array_keys' => 'Laukā :attribute jābūt ierakstiem: :values.',
    'required_if' => 'Lauks :attribute ir obligāts, kad :other ir :value.',
    'required_if_accepted' => 'Lauks :attribute ir obligāts, kad :other ir pieņemts.',
    'required_if_declined' => 'Lauks :attribute ir obligāts, kad :other ir noraidīts.',
    'required_unless' => 'Lauks :attribute ir obligāts, ja vien :other nav :values.',
    'required_with' => 'Lauks :attribute ir obligāts, kad ir klāt :values.',
    'required_with_all' => 'Lauks :attribute ir obligāts, kad ir klāt :values.',
    'required_without' => 'Lauks :attribute ir obligāts, kad :values nav klāt.',
    'required_without_all' => 'Lauks :attribute ir obligāts, kad nav klāt neviens no :values.',
    'same' => 'Laukam :attribute un :other jāsakrīt.',
    'size' => [
        'array' => 'Laukam :attribute jāsatur :size vienumu.',
        'file' => 'Laukam :attribute jābūt :size kilobaiti.',
        'numeric' => 'Laukam :attribute jābūt :size.',
        'string' => 'Laukam :attribute jābūt :size rakstzīmēm.',
    ],
    'starts_with' => 'Laukam :attribute jāsākas ar vienu no šiem: :values.',
    'string' => 'Laukam :attribute jābūt virknei.',
    'timezone' => 'Laukam :attribute jābūt derīgai laika zonai.',
    'unique' => 'Lauks :attribute jau ir aizņemts.',
    'uploaded' => 'Neizdevās augšupielādēt lauku :attribute.',
    'uppercase' => 'Laukam :attribute jābūt lielajiem burtiem.',
    'url' => 'Laukam :attribute jābūt derīgai URL adresei.',
    'ulid' => 'Laukam :attribute jābūt derīgam ULID.',
    'uuid' => 'Laukam :attribute jābūt derīgam UUID.',

    /*
    |--------------------------------------------------------------------------
    | Pielāgotas validācijas valodu līnijas
    |--------------------------------------------------------------------------
    |
    | Šeit jūs varat norādīt pielāgotus validācijas ziņojumus atribūtiem, izmantojot
    | konvenciju "attribute.rule" nosaukumam. Tas ļauj ātri
    | norādīt konkrētu pielāgotu valodas līniju dotajam atribūta noteikumam.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'pielāgots ziņojums',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Pielāgotas validācijas atribūti
    |--------------------------------------------------------------------------
    |
    | Šīs valodu līnijas tiek izmantotas, lai nomainītu mūsu atribūta vietturi
    | ar kaut ko lasītājam draudzīgāku, piemēram, "E-pasta adrese" vietā
    | "email". Tas vienkārši palīdz mums padarīt mūsu ziņojumu izteiksmīgāku.
    |
    */

    'attributes' => [],

];
