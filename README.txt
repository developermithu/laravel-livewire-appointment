# There is two way to generate table data

#1 Factory Easy
 php artisan make:factory ClientFactory     //e.g UserFactory set $return
php artisan tinker  //cmd
Client::factory(5)->create();   //cmd //here Client is model name

#2 Seeding