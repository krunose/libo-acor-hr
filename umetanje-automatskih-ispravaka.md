# Preuzimanje pravila za automatsko ispravljanje
Pravila za automatsko ispravljanje nije potrebno preuzimati iz ovoga repozitorija jer su uključena u izvorni kôd LibreOfficea, dolaze sa hrvatskim jezičnim paketom i dostupna su korisniku nakon instalacije LibreOfficea.

Često ovaj repozitorij sadrži noviju inačicu pravila od one u LibreOfficeovu izvornu kodu jer se nova pravila ne mogu nalaziti u izvornu kodu prethodne inačice i dostupne su tek u sljedećem izdanju LibreOfficea.

Međutim, vrlo se jednostavno mogu novija pravila automatskoga ispravljanja koristiti sa starijim izdanjima LibreOfficea. Sve što treba napraviti jest preuzeti datoteke iz ovoga repozitorija kao zip-datoteku, arhivirati preuzeti sadržaj, preimenovati ga i prenijeti je na odgovarajuće mjesto na računalo ovisno o tome koji se operacijski sustav koristi.

* preuzmite zip-datoteku iz repozitorija: [acor_hr-HR-LibreOffice](https://github.com/krunose/libo-acor-hr) ([izravna poveznica](https://github.com/krunose/libo-acor-hr/archive/master.zip))
* raspakirajte datoteku
* otvorite mapu koja je nastala raspakiravanjem datoteke
* arhivirajte sve datoteke iz te mape u (novu) zip-datoteku (samo sadržaj mape, **ne** i samu mapu) imena **acor_hr-HR.zip**
* preimenujte **zip** u **dat**. U konačnici ime datoteke mora biti **acor_hr-HR.dat**
* tako preimenovanu datoteku kopirajte
	* na **GNU/Linuxu** u **/home/&lt;user name&gt;/.config/libreOffice/4/user/autocorr**. Zamijenite &lt;user name&gt; vašim korisničkim imenom. Ako vam je korisničko ime za prijavu u sustav 'marko', onda datoteku treba kopirati u direktorij `/home/marko/.config/libreOffice/4/user/autocorr`. Staru `acor_hr-HR.dat` datoteku nemojte brisati, preimenujte je u 'backup-acor_hr-HR.dat za svaki slučaj
	* na operacijskome sustavu **Windows** u direktorij **%APPDATA%\libreoffice\4\user\autocorr** gdje `%APPDATA%` treba zamijeniti putanjom na kojoj se na vašem sustavu i inače vrši instalacija programa. Najvjerojatnije **C:\Users&#92;&lt;user name&gt;\AppData\Roaming\libreoffice\4\user\autocorr**. Isto tako &lt;user name&gt; trebate zamijeniti vašim korisnički imenom. Ako vam je korisničko ime za prijavu u sustav 'marko', onda datoteku `acor_hr-HR.dat` treba kopirati u `C:\Users\marko\AppData\Roaming\libreoffice\4\user\autocorr`. Staru datoteku nemojte brisati, preimenujte je u `backup-acor_hr-HR.dat` za svaki slučaj
	* na operacijskome sustavu **Mac OS X**, datoteku `acor_hr-HR.dat` treba kopirati u direktorij **/Users/&lt;user name&gt;/Library/Application Support/LibreOffice/4/user/autocorr**. Zamijenite &lt;user name&gt; vašim korisnički imenom. Ako vam je korisničko ime za prijavu u sustav 'marko', datoteku treba kopirati u mapu `/Users/marko/Library/Application Support/LibreOffice/4/user/autocorr`. Staru datoteku nemojte brisati, preimenujte je u `backup-acor_hr-HR.dat` za svaki slučaj
* ponovno pokrenite LibreOffice. Vodite računa da zatvorite i pokrenutu instanciju LibreOfficea u sistemskoj traci ako vam ja uključeno brzo pokretanje (engl. Quickstarter). Iako nije nužno, najbolje bi bilo ponovno pokrenuti računalo

Ako niste sigurni u koju mapu trebate kopirati **acor_hr-HR.dat** datoteku, otvorite LibreOffice, u izborniku **Alati** odaberite **Mogućnosti**, s lijeve strane dijaloškog okvira odaberite **LibreOffice** te ispod te kategorije odaberite **Putanje** i pogledajte što na desnoj strani stoji uz **Automatsko ispravljanje**.

Za više informacija ovašem korisničkom profilu povezanom s LibreOfficeom pogledajte na [https://wiki.documentfoundation.org/UserProfile](https://wiki.documentfoundation.org/UserProfile). O putanjama se za automatsko ispravljanje govori u [točki 2.2 navedene stranice](https://wiki.documentfoundation.org/UserProfile#Default_location).

---

U ovu se datoteku mogu dodavati i vlastite kratice: **Alati** → **Automatsko ispravljanje** → **Mogućnosti automatskog ispravljanja...** U prvo se polje u kartici **Zamijeni** upisuje *što* se želi zamijeniti, a u drugo se polje upisuje *čime* čime to zamijeniti. Sljedeći je korak na desnoj strani dijaloškog okvira odabrati **Dodaj** i zatim potvrditi s **U redu**.

U istom se dijaloškom okviru mogu i brisati automatska ispravljanja.
