# Pravila za automatsko ispravljanje, iznimke kraja rečenice te iznimke ispravljanja dvaju velikih početnih slova na početku riječi

Za LibreOfficeovu značajku automatskog ispravljanja važne su datoteke

* DocumentList.xml
* SentenceExceptList.xml
* WordExceptList.xml

Budući da se ovaj repozitorij ažurira češće negoli izvorni kôd LibreOffice, upute se kako koristiti novi popis uz stariju inačicu LibreOfficea nalaze u datoteci [umetanje-automatskih-ispravaka.md](https://github.com/krunose/libo-acor-hr/blob/master/umetanje-automatskih-ispravaka.md).

Službena je dokumentacija vrlo štura:

[https://wiki.documentfoundation.org/LibreOffice_Localization_Guide/Advanced_Source_Code_Modifications#Extras](https://wiki.documentfoundation.org/LibreOffice_Localization_Guide/Advanced_Source_Code_Modifications#Extras)


## DocumentList.xml
Datoteka sadrži popis pravila za automatsko ispravljanje riječi ili određenih kombinacija znakova s novom riječi ili novom kombinacijom znakova.

Tako će slijed znakova :^2: dati drugu potenciju, odnosno X:^2: daje X². [[Mogući ispravci](https://github.com/krunose/libo-acor-hr/blob/master/DocumentList.xml)]

U ovu je datoteku poželjno dodavati i one ispravke koji su **nedvojbeno** zatipci.

U hrvatskom se umjesto infinitiva piše krnji infinitiv ako iza njega slijedi nenaglašeni oblik pomoćnog glagola htjeti: 'tražit ću', ne 'tražiti ću'. Nije dobro u ovu datoteku unositi takve ispravke jer, kako se radi o čestoj pogrešci, netko možda upravo o toj pogrešci i piše ili na nju želi upozoriti. Računalo bi svaki takav primjer ispravljalo bez ikakva upozorenja ili podcrtavanja. Slično može biti i s primjerima poput 'avijon', 'idijot', 'kemia'... To su pogreške za provjeru pravopisa, ne automatsko ispravljanje.

Uvijek treba biti oprezan i izbjegavati situacije u kojima računalo izvršava radnje bez eksplicitne potvrde korisnika. Zadaća je računalne provjere pravopisa i gramatike da ispravljaju prethodno navedene primjere i da korisnika na njih upozore podcrtavanjem, ali isto tako korisnik mora odlučiti želi li podcrtano ispravljati ili ne!

U engleskoj se inačici pravila za automatsko ispravljanje nalazi (ili se nalazilo) pravilo koje zatipak 'nwe' zamjenjuje sa 'new', što je se na prvi pogled čini dobrim rješenjem i naoko je u skladu s ovdje iznesenim. Međutim, jedan je korisnik automatskog ispravljanja za engleski jezik trebao i **želio** napisati 'nwe' jer je to kratica (oznaka) za jedan mali jezik u (ili oko) Kameruna. LibreOffice je svaki 'nwe' zamijenio s 'new' bez ikakvog upozorenja i korisnik je primijetio pogrešku kada je već bilo kasno. Štetu nije moguće ispraviti običnom zamjenom teksta (engl. find and replace) jer bi se promjena izvršila i na onim mjestima gdje doista i treba pisati 'new'.

U ovom bi slučaju podcrtavanje pomoću provjere pravopisa ili gramatike bilo bolje rješnje jer bi korisnik bio upozoren na potencijalnu pogrešku, ali sadržaj ne bi bio uništen neželjenim ispravljanjem.

U ovu datoteku **treba** dodati ono što je nedvojbeno zatipak i ono što bi nepotrebno opterećivalo rječnik za provjeru pravopis ili povećavalo broj pravila za provjeri gramatike, recimo primjere poput 'pokuša tću'. Nema potrebe da korisnik eksplicitno potvrđuje ovakve situacije. Ali i opet treba biti oprezan.

Nevolja je u tome što korisnik ne može znati što se sve nalazi na ovom popisu i onaj tko sastavlja popis nikada ne može predvidjeti sve moguće upotrebe i korištenja popisa (kontekste pisanja) pa treba biti oprezan oko dodavanja pravila. Bolje je izostaviti nego dodatni pogrešno.

---

Popis se zamjena koje su dodani mimo inicijalnih/standardnih nalazi u datoteci [dodano.txt](https://github.com/krunose/libo-acor-hr/blob/master/dodano-na-documentlist.txt).


## SentenceExceptList.xml
Točka označava kraj rečenice. LibreOffice automatski riječ iza točke ispravlja iz maloga početnoga slova u veliko. Međutim, nije svaka točka i znak kraja rečenice. Problem su kratice i skraćenice iza kojih se piše točka, a ne označavaju kraj rečenice. Primjer su kratice.

Da bi se spriječilo automatsko ispravljanje malog slova u veliko iza kratica, na ovaj popis treba dodati kratice koje se ne mogu nalaziti na samom kraju rečenice, ili se tamo nalaze vrlo rijetko.

Jasnije će biti na primjeru 'Tako je 2016. god. odlučeno [...]'. Kada se kratica 'god.' ne nalazila na popisu iznimaka ispravljanja maloga slova u veliko, čim bi korisnik napisao 'odlučeno', LibreOffice bi automatski 'odlučeno' ispravio u 'Odlučeno': 'Tako je 2016. god. Odlučeno [...]'.

Uvrštavanjem kratice 'god.' na ovaj popis, LibreOffice ne uzima točku u kratici kao znak kraja rečenice već je ignorira.

Treba biti oprezan i ne uključivati kratice koje su izrazom jednake riječima koje doista i mogu stajati na kraju rečenice: 'čest.' od 'čestica' i 'čest' kao pridjev jer ta riječ može stajati na kraju rečenice.

Potrebno je vagati i provjeravati u jezičnim korpusima. Pitanje je javlja li se češće riječ 'med' na kraju rečenice kao imenica: 'Kupio je med.', ili je češće riječ o skraćenici, recimo 'med.' za 'medicina'.

Iza rednih brojeva LibreOffice ne ispravlja mala slova.

### Dodatne napomene
Unosi ove datoteke ne mogu sadržavati razmak, već se svaki dio takve višedijelne kratice mora unijeti posebno, što se ne mora uvijek biti razriješeno na korisnikovo zadovoljstvo.

Problem mogu biti kratice sastavljene od više dijelova kada se neke ili sve dijelove namjerno ne želi unijeti na popis. Tako se 'med.' od 'medicina' ne nalazi na popisu iznimaka za ispravljanje maloga slova u veliko jer 'med' može značiti i 'mêd' (pčelinji proizvod) i u tom slučaju 'med.' bi označavao kraj rečenice i sljedeća bi se riječ trebala pisati velikim slovom. Isto je i s kraticom 'dr.' gdje ona može značiti 'doktor' (znanosti), ali i 'drugo' i u ovoj se drugoj situaciji može naći na kraju rečenice.

S obzirom na prethodno, LibreOffice će 'dr. med. vet.' (doktor veterinarske medicine) ispraviti u 'dr. Med. Vet.' jer se 'dr.' i 'med' ne nalaze na ovome popisu. Naravno, riječ iza 'vet.' neće biti automatski ispravljena iz maloga u veliko slovo jer se ta kratica nalazi na ovome popisu. Treba istražiti stoji li češće 'dr.' u značenju 'doktor' (znanosti) u sredini rečenice, ili češće 'i dr.' (i drugo) stoji na kraju rečenice. Znači: postoji opreka između '**dr.** vet. med. Ivan Horvat' te 'Kupili smo kruške, jabuke i dr. Svježe je voće uvijek ukusno.' Dvije različite situacije koje traže dva različita rezultata, a radi se o ista tri znaka. U takvim će se situacijama morati raditi određeni kompromisi. Možda bi se moglo 'dr. Vet. Med' ispraviti u 'dr. vet. med.' koristeći se datotekom DocumentList.xml.

Na ovom se popisu nalazi kratica 'sc.' Zanimljivo je to što 'dr. sc.' neće biti automatski ispravljeno u 'dr. Sc.' iako bi se to očekivalo. Prvi bi zaključak mogao biti da je tomu tako jer se kratica 'sc.' nalazi na popisu, međutim nije zbog toga. Ispravljanje se neće dogoditi ni s izmišljenim kraticama: 'gg. tt.' neće biti ispravljeno u 'gg. Tt.' bez obzira što se ni 'gg.' ni 'tt.' ne nalaze na ovome popisu. Ipak, napiše li se 'gg. ttt.', do zamjenjivanja će doći: 'gg. Ttt.' Dalje, zamjena se 'to' u 'To' neće dogoditi ako piše 'Jutros sam... to! Sunčano je.', ali će do zamjene doći ako piše 'Jutros! to!' Očito je važno koji znak prethodi i koliko znakova ima riječ koja slijedi, čak kada se i ne radi o kraticama. Riječ 'to' u navedenom primjer nije kratica i iza nje nije slijedila točka.

Zaključak je da će se, barem dok razvijatelji ne odluče promijene pravila određivanja kraja rečenice, sve višedijelna kratice čiji drugi dio nije veći od dva slova rješavati na zadovoljstvo korisnika bez obzira nalaze li se na ovome popisu ili ne: 'dr. sc.' (doktor znanosti), 'nar. pj.' (narodno pjesništvo), 'pril. pr.' (prilog prošli). Isto će biti i s dvodijelnim kraticama koje su dulje od dva slova a **nalaze se** na ovom popisu: 'pov. umj.' (povijest umjetnosti: obje se kratice nalaze na popisu), prid. trp. (pridjev trpni).

U ostalim situacijama treba naći mjeru. Može se ponešto ispraviti dopisivanjem pravila u datoteku DocumentList.xml. Svakako bi pomoglo poznavati točna pravila po kojima LibreOffice definira kraj rečenice, ali trebalo bi i znati za svaku takvu kraticu nalazi li se češće u sredini rečenice ili na kraju.

### Komentari uz problematične kratice

LibreOffice iza rednih brojeva ne ispravlja malo slovo u veliko. Tako je jer se redni brojevi pišu s točkom i u tom slučaju točka nije interpunkcijski nego pravopisni znak. Nevolja je u tome što se brojevi ponekad mogu naći i na samom kraju rečenice i tada točka stoji i kao pravopisni znak (redni broj) i kako interpunkcijski znak (kraj rečenice). Korisnik će sâm morati prvu riječ sljedeće rečenice pisati velikim slovom i tu se ne može puno napraviti.

#### g.
Odlučeno je da se na aktivni popis doda i kratica 'g.' iako se dosta često može nalaziti na kraju rečenice, često se i ne nalazi na kraju rečenice: 'U 2016. g. nismo uspjeli [...]', 'Bilo je to 2016.'. Kao i sa rednim brojevima, ni ovdje nije moguće računalu dati jednoznačne upute radi li se o kratici unutar rečenice ili kraju rečenice. Dostupni alati i mehanizmi nisu dostatni za razrješenje ambigviteta. Budući da je kratica dodana na popis, čak kada i bude na kraju rečenice, korisnik će sam morati prvu riječ sljedeće rečenice napisati velikim slovom, neće se provesti automatsko ispravljanje.

Uvrštavanjem se ove kratice na popis ne kvari funkcionalnost (u najgorem je slučaju ostala ista), dapače popravlja se u onim situacijama kada 'g.' stoji za 'gospodin' i tada se nikad ne nalazi na kraju rečenice nego se očekuje da iza nje slijedi ime.

Netko može pomisliti kako je ovaj mehanizam dobar za ispravljanje pisanja osobnih imena malim slovom iza kratice 'g.': g. marko > g. Marko. To nije dobro jer lomljenje jedne rečenice na dvije, koje to zapravo nisu, može prevariti provjeru gramatike i time onemogućiti provjeru reda riječi, pisanje zareza ili slično. O velikom i malom slovu treba brinuti provjera pravopisa i provjera gramatike.

Uzme li se u obzir da 'g.' stoji iza 'godina' i za 'gospodin', bolje ju je uključiti nego izostaviti, bez obzira što se u (rijetkim) slučajevima može nalaziti na kraju rečenice.


## WordExceptList.xml
Datoteka WordExceptList.xml sadrži pravila za automatsko ispravljanje riječi koje su pogrešno napisane dvama velikim slovima na početku riječi: MArko > Marko.

Ima primjera, ponajviše kratica i skraćenica, koje i treba pisati dvama velikim slovima. Kratica 'OOo' stoji za 'OpenOffice.org'. Kada 'OOo' ne bi bio na ovom popisu, LibreOffice bi 'OOo' ispravljao u 'Ooo'.

Međutim, izgleda da ima i odstupanja. LibreOffice nije ispravljao kraticu 'MHz' u 'Mhz' bez obzira što se nije nalazila na ovom popisu i to je zato što se ta kratica nalazila u rječniku za provjeru pravopisa. Znači da se ovakvo automatsko ispravljanje provodi samo na riječima koje se ne nalaze u rječniku za provjeru pravopisa ili na ovom popisu. Za potvrdu teze može se izmisliti kratica 'MHt' i LibreOffice će je ispraviti u 'Mht', ali ako se kratica doda u rječnik za provjeru pravopisa, ili na ovaj popis, automatsko ispravljanje izostaje.

Postoji problem s primjerima poput 'PC-a', 'PC-u' (od engl. <i>Personal Computer</i>). Ako se ove kratice ispravno napišu – sa spojnicom kako je u primjerima – problema nema. Ako se pak pogriješi i napiše 'PCa', 'PCja' ili 'PCu', 'PCem', 'PCjem', LibreOffice će automatski takve unose zamijeniti s 'Pca', 'Pcja', 'Pcu', 'Pcem', 'Pcjem'. Sada je problem jer se rječniku za provjeru pravopisa šalju pogrešne riječi na provjeru. Rječnik za provjeru pravopisa ne može predložiti 'PC-a' za 'PCa' jer zapravo dobiva na provjeru 'Pca' pa predlaže, zapravo logično i očekivano, 'Oca', 'Pac' (pâc), 'Psa' jer je 'Pca' sličnije 'Oca' negoli 'PC-a'.

Zaobilazni je put da se na ovaj popis dodaju i najčešće pravopisne pogreške koje imaju dva velika slova na početku. Da bi se zaobišao ovaj nedostatak i da bi se dozvolilo rječniku za provjeru pravopisa da radi svoj posao, na popis je potrebno dodati primjere poput 'PCa', 'PCja', 'PCu', 'PCju', 'PCom', 'PCjom' i slično. Sada računalo neće više ispravljati 'PCa' u 'Pca' nego će ostaviti 'PCa', a rječnik će za provjeru pravopisa sada moći predložiti 'PC-a'.


## dodano-na-documentlist.txt
U datoteci se navode unosi kojih nema na izvornom LibreOfficeovom popisu. Dodani su naknadno što je bilo potrebno radi lakšeg ispravljanja eventualnih pogrešaka i vođenja evidencije o tome što je i kada je dodano na popis.


## Umetanje-automatskih-ispravaka.md
U datoteci se opisuje postupak unošenja ovog popisa za automatsko ispravljanje u računalo. Često su pravila za automatsko ispravljanje iz [ovog repozitorija](https://github.com/krunose/libo-acor-hr) novija od onih koja se nalaze u izvornom kodu LibreOfficea.
