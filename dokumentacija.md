# Pravila za automatsko ispravljanje, iznimke kraja rečenice te iznimke ispravljanja dvaju velikih početnih slova na početku riječi

Za LibreOfficeovu su značajku automatskog ispravljanja važne datoteke

* DocumentList.xml
* SentenceExceptList.xml
* WordExceptList.xml

Budući da se ovaj repozitorij ažurira češće negoli izvorni kôd LibreOfficea, upute se kako koristiti novija pravila uz stariju inačicu LibreOfficea nalaze u datoteci [umetanje-automatskih-ispravaka.md](https://github.com/krunose/libo-acor-hr/blob/master/umetanje-automatskih-ispravaka.md).

Službena je dokumentacija pomalo štura:

[https://wiki.documentfoundation.org/LibreOffice_Localization_Guide/Advanced_Source_Code_Modifications#Extras](https://wiki.documentfoundation.org/LibreOffice_Localization_Guide/Advanced_Source_Code_Modifications#Extras)


## DocumentList.xml
Datoteka sadrži popis pravila za automatsko ispravljanje riječi ili određenih kombinacija znakova s novom riječi ili novom kombinacijom znakova.

Primjenjuje se isti mehanizam ispravljanja na dvije situacije.

Prva se odnosi na ispravljanje jedne kombinacije znakova drugom. Tako će `:^2:` dati drugu potenciju, odnosno `X:^2:` daje `X²`. [[Mogući ispravci](https://github.com/krunose/libo-acor-hr/blob/master/DocumentList.xml)]

Druga se situacija odnosi na ispravljanje pogrešaka u pisanju. U ovu je datoteku poželjno dodavati i one ispravke koji su **nedvojbeno** zatipci, ili pak kada je riječ o ispravljanju maloga i velikoga slova u dvojnim kraticama zbog točke: dr. vet. [> dr. Vet.] > dr. vet.

Ovom datotekom nije dobro ispravljati infinitive u futuru jer se ispravljanje odvija beziznimno, bez upozorenja i, dakle, bez potvrde korisnika. Ispravljanje se može izvesti ovom datotekom s tehničke, ali problem je ako netko doista želi napisati 'tražiti ću' jer piše jezični savjet ili pripreme za školski sat gdje se želi usporediti pravilno i nepravilno pisanje jer će računalo bez upozoravanja korisnika ispraviti sve takve primjere što rezultira neželjenim uništavanjem sadržaja. Ovakvi bi se primjeri trebali ispravljati računalnom provjerom pravopisa i gramatike jer se u tom slučaju potencijalne pogreške podcrtavaju – korisnika se upozori na pogrešku, ali mu je ostavljeno na izbor želi li podcrtano ispraviti ili ne. Slično je i s primjerima 'avijon', 'kemia' i slično. Na kraju krajeva, bolje je i propustiti pogrešku nego ispravljati ono što ne treba ispravljti. U prvom je slučaju odgovornost na korisniku, a u drugom na onome tko piše pravila za automatsko ispravljanje.

U engleskoj se inačici pravila za automatsko ispravljanje nalazi (ili se nalazilo) pravilo koje zatipak 'nwe' zamjenjuje s 'new', što se na prvi pogled može činiti dobrim pravilom. Međutim, jedan je korisnik automatskog ispravljanja za engleski jezik trebao i **želio** napisati 'nwe'. Svaki je 'nwe' zamijenjen s 'new' bez ikakvog upozorenja i korisnik je primijetio pogrešno ispravljanje kada je već bilo kasno. Štetu nije moguće ispraviti automatskom zamjenom teksta (engl. find and replace) jer bi se zamjena provela u oba slučaja – gdje treba i gdje ne treba; jedino je rješenje pregledati cijeli tekst i sve pogreške ispraviti ručno.

Ipak, na ovaj popis treba dodati ono što nedvojbeno i jest zatipak, odnosno ono što bi nepotrebno opterećivalo rječnik za provjeru pravopis ili bi nepotrebno povećavalo broj pravila za provjeri gramatike: pokuša tću > pokušat ću. Većina takvih zatipaka karakteristična za pojedinca, njegov način pisanja i način korištenja tipkovnice. Zbog toga bi na ovaj popis svatko trebao dodati one ispravke koji će upravo njemu pomoći pri pisanju, olakšati i ubrzati proces provjere i ispravljanja pravopisnih i gramatičkih pogrešaka. Osim toga, datoteka se `DocumentList.xml` može koristiti i za dodavanje kratica koje će stajati za dulje riječi ili sintgme: :LO: > LibreOffice, :LOa: > LibreOfficea... Isto, svatko treba dodati one kratice koje najčešće koristi.

Korisnik ne može znati što se sve nalazi na ovom popisu i onaj tko sastavlja popis nikada ne može predvidjeti sve moguće upotrebe. Kao što je već rečeno: bolje izostaviti i dopustiti da korisnik doda sam nego dodatni pogrešno.

Popis se zamjena koje su dodani mimo inicijalnih/standardnih nalazi u datoteci [dodano.txt](https://github.com/krunose/libo-acor-hr/blob/master/dodano-na-documentlist.txt).


## SentenceExceptList.xml
Točka označava kraj rečenice. LibreOffice automatski malo slovo iza točke ispravlja u veliko. Međutim, nije svaka točka i kraj rečenice. U vezanom bi tekstu (članci, seminarski i diplomski radovi) i inače trebalo izbjegavati (nepotrebne) kratice.

Da bi se spriječilo automatsko ispravljanje malog slova u veliko iza kratica, na ovaj popis treba dodati samo kratice koje se ne mogu nalaziti na samome kraju rečenice, ili se tamo nalaze vrlo rijetko.

Jasnije će biti na primjeru 'Tako je 2016. god. odlučeno [...]'. Kada se kratica 'god.' ne bi nalazila na popisu iznimaka ispravljanja maloga slova u veliko, čim bi korisnik napisao 'odlučeno', LibreOffice bi automatski 'odlučeno' ispravio u 'Odlučeno': 'Tako je 2016. god. Odlučeno [...]'.

Uvrštavanjem kratice 'god.' na ovaj popis, LibreOffice ne uzima točku u kratici kao znak kraja rečenice i ignorira je.

Treba biti oprezan i ne uključivati kratice koje su izrazom jednake riječima koje doista i mogu stajati na kraju rečenice: 'čest.' (od 'čestica') izrazom je jednaka riječi 'čest' (pridjev) jer se ta riječ lako može naći na kraju rečenice.

Potrebno je vagati i provjeravati u jezičnim korpusima. Pitanje je javlja li se češće riječ 'med' na kraju rečenice kao imenica: 'Kupio je med.', ili je češće riječ o skraćenici, recimo 'med.' za 'medicina'.

Iza rednih brojeva LibreOffice ne ispravlja mala slova.

### Dodatne napomene
Unosi ove datoteke ne mogu sadržavati razmak, već se svaki dio takve višedijelne kratice mora unijeti posebno a ispravak ne mora uvijek biti po volji korisnika.

Ispravljanje se neće dogoditi bez obzira na to nalazi li se kratica na popisu ili ne ako ima jedno ili dva slova iza kojih slijedi točka. Dokaz su za to izmišljene kratice. Tako 'gg. tt.' neće biti ispravljeno u 'gg. Tt.' bez obzira što se ni 'gg.' ni 'tt.' ne nalaze na ovome popisu, a iza obje 'kratice' stoji točka. Naravno, riječ će iza 'gg. tt.' biti ispravljena: 'gg. tt. riječ' > 'gg. tt. Riječ'. Napiše li se 'gg. ttt.', do ispravljanja će maloga slova u veliko doći: 'gg. ttt.' > 'gg. Ttt.' Dalje, ispravljanje se velikoga i maloga slova neće vršiti ni iza trotočke bez obzira na duljinu riječi. Zaključak je da u dvodjelnih kratica drugi dio neće biti ispravljen u veliko slovo ako nije veći od dva slova: 'nar. pj' **neće** biti ispravljeno u 'nar. Pj.' bez obzira nalazi li se 'nar.' i 'pj.' na ovome popisu.

U ostalim situacijama treba naći mjeru. Može se ponešto ispraviti dopisivanjem pravila u datoteku `DocumentList.xml`. Svakako bi pomoglo poznavati točna pravila po kojima LibreOffice definira kraj rečenice, ali trebalo bi i znati za svaku takvu kraticu nalazi li se češće u sredini rečenice ili na kraju.

### Komentari uz problematične kratice

LibreOffice iza rednih brojeva ne ispravlja malo slovo u veliko. Tako je jer se redni brojevi pišu s točkom i u tom slučaju točka nije interpunkcijski nego pravopisni znak. Nevolja je u tome što se brojevi ponekad mogu naći i na samom kraju rečenice i tada točka stoji i kao pravopisni znak (redni broj) i kako interpunkcijski znak (kraj rečenice). Korisnik će sâm morati prvu riječ sljedeće rečenice pisati velikim slovom i tu se ne može puno napraviti.

#### g.
Odlučeno je da se na aktivni popis doda i kratica 'g.' iako se dosta često može nalaziti na kraju rečenice, često se i ne nalazi na kraju rečenice: 'U 2016. g. nismo uspjeli [...]', 'Bilo je to 2016.'. Kao i sa rednim brojevima, ni ovdje nije moguće računalu dati jednoznačne upute radi li se o kratici unutar rečenice ili kraju rečenice. Dostupni alati i mehanizmi nisu dostatni za razrješenje ambigviteta. Budući da je kratica dodana na popis, čak kada i bude na kraju rečenice, korisnik će sam morati prvu riječ sljedeće rečenice napisati velikim slovom, neće se provesti automatsko ispravljanje.

Uvrštavanjem se ove kratice na popis ne kvari funkcionalnost (u najgorem je slučaju ostala ista), dapače popravlja se u onim situacijama kada 'g.' stoji za 'gospodin' i tada se nikad ne nalazi na kraju rečenice nego se očekuje da iza nje slijedi ime.

Netko može pomisliti kako je ovaj mehanizam dobar za ispravljanje pisanja osobnih imena malim slovom iza kratice 'g.': g. marko > g. Marko. To nije dobro jer lomljenje jedne rečenice na dvije, koje to zapravo nisu, može prevariti provjeru gramatike i time onemogućiti provjeru reda riječi, pisanje zareza ili slično. O velikom i malom slovu treba brinuti provjera pravopisa i provjera gramatike.

Uzme li se u obzir da 'g.' stoji iza 'godina' i za 'gospodin', bolje ju je uključiti nego izostaviti, bez obzira što se u (rijetkim) slučajevima može nalaziti na kraju rečenice.

#### Kratice akademskih stupnjeva
S obzirom na prethodno, LibreOffice će 'dr. med. vet.' (doktor veterinarske medicine) ispraviti u 'dr. Med. Vet.' jer se 'dr.' i 'med.' ne nalaze na ovome popisu, a obje su kratice dulje od dva slova (v. [Dodatne napomene](https://github.com/krunose/libo-acorr-hr/blob/master/dokumentacija.md#dodatne-napomene)). Naravno, riječ iza 'vet.' neće biti automatski ispravljena iz maloga u veliko slovo jer se ta kratica nalazi na ovome popisu. Treba istražiti stoji li češće 'dr.' u značenju 'doktor' u sredini rečenice, ili češće 'dr.' (i drugo) stoji na kraju rečenice, odnosno s obzirom na to što je češće treba kraticu 'dr.' ili uključiti ili isključiti s ovoga popisa. To su dvije različite situacije koje traže dva različita rezultata, a radi se o ista tri znaka. Potrebno je raditi kompromise. Naravno, bolje bi bilo pisati uvijek pisati 'i drugo' negoli 'i dr.' pa onda kraticu 'dr.' koristiti isključivo za 'doktor', ali nije mudro oslanjati se na taj jezični savjet jer se prerijetko poštiva a da bi bio mjerilo.

Kratice su sveučilišnih titula preuzete s
http://narodne-novine.nn.hr/clanci/sluzbeni/2015_05_50_991.html; pristupljeno 17. ožujka 2017.


## WordExceptList.xml
Datoteka WordExceptList.xml sadrži pravila za automatsko ispravljanje riječi koje su pogrešno napisane dvama velikim slovima na početku riječi: MArko > Marko.

Ima primjera, ponajviše kratica i skraćenica, koje i treba pisati dvama velikim slovima. Kratica 'OOo' stoji za 'OpenOffice.org'. Kada 'OOo' ne bi bio na ovom popisu, LibreOffice bi 'OOo' ispravljao u 'Ooo'.

Međutim, izgleda da ima i odstupanja. LibreOffice nije ispravljao kraticu 'MHz' u 'Mhz' bez obzira što se nije nalazila na ovom popisu i to je zato što se ta kratica nalazila u rječniku za provjeru pravopisa. Znači da se ovakvo automatsko ispravljanje provodi samo na riječima koje se ne nalaze u rječniku za provjeru pravopisa ili na ovom popisu. Za potvrdu teze može se izmisliti kratica 'MHt' i LibreOffice će je ispraviti u 'Mht', ali ako se kratica doda u rječnik za provjeru pravopisa, ili na ovaj popis, automatsko ispravljanje izostaje.

Na ovaj popis treba dodavati i kratice od dva velika početna slova koje su u kosim padežima pogrešno napisane bez spojnice između osnove i padežnoga nastavka. Kratica se za engl. izraza 'personal computer' piše dvama velikim slovima: PC. Genitivni se oblik piše sa spojnicom: PC-a. Međutim, često se može vidjeti pogrešno pisanje, bez spojnice: PCa. Problem je u tome što automatsko ispravljanje u 'PCa' vidi riječ od tri slova u kojoj su prva dva (pretpostavlja pogrešno) napisana velikim slovima i automatski se vrši ispravak u 'Pca'. Takav ispravak ne olakšava. Računalna će provjera pravopisa u pogrešci 'PCa' lako prepoznati 'PC-a' jer je razlika samo u jednom znaku – spojnici. Teže je nakon izvršenoga automatskog ispravka ispravka jer je razlika između 'Pca' i 'PC-a' u dvama znakovima – spojnici i malomu slovu c umjesto velikoga kako očekuje rječnik za provjeru pravopisa. Tako je 'Pca' na samo jedan znak razmaka od riječi 'Psa' (genitiv od 'pȁs') i provjera će pravopisa prvo ponudi tu riječ kao zamjenu umjesto da ponudi kraticu napisanu spojnicom. Zbog toga na ovaj popis iznimaka treba dodavati i pogreške poput 'PCa' kako se izbjeglo automatsko ispravljanje u situacijama kada bi takvo ispravljanje otežalo računalnu provjeru pravopisa. Naravno, treba voditi računa o tome da se sve kratice s ovoga popisa nalaze u rječniku za provjeru pravopisa (točno napisane).

Na ovom se popisu nalaze veće pogreške od nepisanja spojnice jer je važno da razlika između točnoga pisanja i pogreške bude što manja. Promjena drugoga slova takih kratica iz velikoga u malo samo produbljuje tu razliku. Namjerne su pogreške označene komentarom uz pojedinu kraticu (v. u datoteci [WordExceptList.xml](https://github.com/krunose/libo-acorr-hr/blob/master/WordExceptList.xml)).


## dodano-na-documentlist.txt
U datoteci se navode unosi kojih nema na izvornom LibreOfficeovom popisu. Dodani su naknadno što je bilo potrebno radi lakšega ispravljanja eventualnih pogrešaka i vođenja evidencije o tome što je i kada je dodano na popis.


## Umetanje-automatskih-ispravaka.md
U datoteci se opisuje postupak unošenja ovog popisa za automatsko ispravljanje u računalo. Često su pravila za automatsko ispravljanje iz [ovog repozitorija](https://github.com/krunose/libo-acor-hr) novija od onih koja se nalaze u izvornom kodu LibreOfficea.
