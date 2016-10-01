Merhaba

ilk önce proje algoritması yaptım sırasıyla

db'ler oluşturulacak ve foreign keyle birbirine bağlanacak
xml'den db veriler çekilecek
basit bir ön yüz tasarımı oluşturulacak
paginationlu hale getirilecek
calori toplama işlemi yapılacak


db'de foreign key ile birbirine bağlama olayını bildiğim için sıkıntı olmadı. database kontrol için navicat kullandım query içerisinde bağlantıyı rahatça kurdum CASCADE olarak ayarladım. 

xml'den veri almadan önce codeigniter bilgimi tazelemem gerekiyor. Daha önce örnek bir proje yaptım, oradan codeignitera özel controller,model yapısına aşinayım. eski yaptığım projeyi bir inceledim.
parse işlemini gerçekleştiricem veriyi internetten alıyım diye düşündüm. demo bir sitenin içerine xml'i ekledim. 
curl ile çektim örneği;
http://stackoverflow.com/questions/18697422/send-xml-data-to-webservice-using-php-curl
simple_xml ile parseledim.aldığım veriyi ekrana yansıttım.

db veri göndermek foreach içerisinde aldım.modela gönderdim.model'da array yapıp topluca insert etsem diye biraz uğraştım. ama Value değerlerin başına imleç '$name' gibi koyamadım.
daha önce explode,implode ile parçalayıp içine ekstra simge eklemiştim ama baktım iş uzuyor cod'da kalabalıklaşmasın diye set ile tek tek verileri db gönderdim.
veri sayfa açıldığında db gidecek ama sorun her sayfa açıldığında bir daha db veri yazıyor. 
bunu engellemek en mantıklısı, engellersemde 5 satır olan veriyi 5 satırlık pagination yapısına uyguladığımda pagination göremiyeceğiz. sınırlama getiriyorum basitce db max rowcount 14 olsun diyorum. 3 sayfalık pagination görsel için yeterli olacaktır.
en son olarak 2. db için, 1. db ile bağlıyacağım bir veri girmem lazım ki CASCADE işe yarasın. 
ilk düşüncem db içerisine xmlden gelen herhangi bir colm çekip db'le birlikte yazdırmaktı, sonra last inserted id çekmenin daha şık olduğunu düşündüm. 
hızlı şekilde sonuca ulaşamayınca, onun yerine basitçe row numaralarını çekip yazdırdım, aynı işlem gerçekleşmiş oldu.
Buraya kadar ekstra kaynak kullanmam gerekmedi.

Bootstrap yükledim bir form oluşturdum.

verileri çekip ekrana yazdırdm.

pagination kısmında kendi pagination library'sini kullandım.
Burada açık bir şekilde anlatmış.
https://www.codeigniter.com/userguide3/libraries/pagination.html
görüntüyü bootstrapa çevirmek için bunu kullandım,
https://gist.github.com/edomaru/2d85feac614cd265658f
segment hatası için
http://stackoverflow.com/questions/10866652/codeigniter-pagination-uri-segment
ilk sayfanın linki boştu bunu gidermek içinse alttaki çözümü buldum,
http://stackoverflow.com/questions/9989494/first-page-link-issue-in-codeigniter-pagination-library

Ajaxı daha önce validation için kullandım.mantığını aşağıdaki linklerden çözdüm
http://www.w3schools.com/php/php_ajax_database.asp
https://www.youtube.com/watch?v=BqTiG2WC-ac
https://www.formget.com/codeigniter-jquery-ajax-post/

ilk önce check box'ın clasını ve value'sini atadım. check ve uncheck olarak ayırdım. type olarak ajaxa aldım ve ajax.php oluşturup idyi gönderdim. 
modelda ajax'ın db işlemlerini ajaxAction altında yaptım.aşağıda ki linkte tüm query işlemleri var
http://www.codeigniter.com/userguide3/database/query_builder.html
veriyi return edip, home'da int'e çevirdim. claas'a ekleme ve çıkarma işlemlerini yaptırdım.

En çok uğraştığım pagination bugları ve ajax işlemi oldu. Şimdilik aklıma gelenler bunlar, az kod çok iş =)
Umarım doğru yolu izlemişimdir

Sercan Küliğ
