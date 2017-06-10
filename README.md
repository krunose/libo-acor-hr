# Pravila za automatsko ispravljanje, iznimke kraja rečenice te iznimke ispravljanja dvaju velikih početnih slova na početku riječi

Pravila za automatsko ispravljanje nisu dio ni računalne provjere pravopisa ni računalne provjere gramatike, ali olakšavaju pisanje složenijih znakova poput `‰` i `‱` te pospješuju ispravljanje maloga i velikoga slova na početku rečenice ili u riječi kada umjesto jednoga velikoga početnoga slova napišu dva: ispravak iz `LIbreOffice` u `LibreOffice`.

---

LibreOffice iza točke automatski ispravlja malo slovo u veliko početno slovo jer ono što slijedi iza točke tretira kao početak nove rečenice; malo slovo iza točke znači pravopisnu pogrešku. Ipak, nije svaka točka i kraj rečenice, iznimke su kratice koje se pišu s točkom, redni brojevi i drugo. Datoteka `SentenceExceptList.xml` pomaže razlikovati kraj rečenice od kratice s točkom.

Automatsko će ispravljanje zamijeniti i dva velika slova na početku riječi pa će MOzilla biti ispravljena u Mozilla. Međutim, postoje situacije kada je takvo isptavljanje nepoželjeno: MHz, MWh. Datoteka `WordExceptList.xml` pomaže razlikovati situacije kada treba pisati dva velika početna slova na početku riječi od situacija kada ne treba.

Treća je važna datoteka `DocumentList.xml` u kojoj su definirana pravila zamjene jedne sekvencije znakova drugom sekvencijom. Tako će `:_2:` dati `₂` (zamjena `H:_2:O` s `H₂O`), a `:autorska prava:` će dati znak ©.

---

Službena dokumentacija

https://wiki.documentfoundation.org/LibreOffice_Localization_Guide/Advanced_Source_Code_Modifications#Extras

---

Sadržaj

* **umetanje-automatskih-ispravaka.md** &mdash; upute kako dodati pravila na računalo za korištenje uz LibreOffice
* **dokumentacija.md** &mdash; opisane važne datoteke, dokumentirane odluke i potencijalni problemi
* **dodano-na-documentlist.txt** &mdash; popis unosa koji su dodani u datoteku DocumentList.xml mimo osnovnih/inicijalnih
* **DocumentList.xml** &mdash; pravila za automatsko ispravljanje
* **SentenceExceptList.xml** &mdash; popis kratica s točkom koje zapravo ne označavaju kraj rečenice
* **WordExceptList.xml** &mdash; popis riječi i kratica koje se pišu s dva velika početna slova
* **licence.md** &mdash; licencija i informacije za kontakt

---

Repozitorij i kontakt: https://github.com/krunose/libo-acorr-hr

---

Inačica 2017-06-10
