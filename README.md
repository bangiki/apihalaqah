# API Halaqah

This source for RESTful API Halaqah Depok v1.

## Dokumentasi

## URL EndPoint

Berikut list URL Endpoint API per-feature

- [Register User](https://github.com/ramdanix/apihalaqah/blob/master/README.md#register-user)
- [Auth User](https://github.com/ramdanix/apihalaqah/blob/master/README.md#auth-user)
- [List Member](https://github.com/ramdanix/apihalaqah/blob/master/README.md#list_member)


## Authentikasi

## POST  
### Register User

URL Request

**Production**
``` bash
http://apihalaqah.dev/api/v1/auth/register
```

**Production**

``` bash
http://apihalaqah.trycatch.id/api/v1/auth/register
```

Header

Field | Value | 
------------ | ------------- 
**Content-Type** | application/json 
**Accept** | application/json 

Body

Field | Type Data | Validation
------------ | ------------- | -------------
**name** | String | required
**email** | String | required email
**password** | String | required min:6
**gender** | String | required
**kelas** | String | required
**level** | int | required


Response

``` json
{
	"data": {
		"id": 10,
		"name": "dea",
		"email": "dea9@gmail.com",
		"gender": "Perempuan",
		"kelas": "Tholabul 'Ilm 03",
		"level": 0,
		"registered": "1 second ago"
	}
}
```

### Auth User

URL Request


**Local**

``` bash
http://apihalaqah.dev/api/v1/auth/login
```

**Production**

``` bash
http://apihalaqah.trycatch.id/api/v1/auth/login
```


Header

Field | Value | 
------------ | ------------- 
**Content-Type** | application/json 
**Accept** | application/json 

Body

Field | Type Data | Validation
------------ | ------------- | -------------
**email** | String | required email
**password** | String | required min:6

Response

``` json
{
	"data": {
		"id": 2,
		"name": "Rizki Ramdani",
		"email": "ramdani.rizki19@gmail.com",
		"gender": "Laki-laki",
		"kelas": null,
		"level": 1,
		"registered": "7 hours ago"
	},
	"meta": {
		"token": "MVdRRHBjeHNKRWpLN0ZnTW00elp4OWU2cXlicnV0RWFpVXc4OFZKVA=="
	}
}
```
## List Member

## GET

URL Request

**Local**
``` bash
http://apihalaqah.dev/api/v1/members/{kelas}
```

**Production**
``` bash
http://apihalaqah.trycatch.id/api/v1/members/{kelas}
```

Header

Field | Value | 
------------ | ------------- 
**Authorization** | String token 

Bulk Header

``` bash
Authorization: Bearer SFM3bE90NWF6NUlLRGk5aUR4czZtUTVwM0dHd1V0RzRpRHBFMTRYdw==
```

Body

**none**

Parameter

Param | Type Data | 
------------ | ------------- 
**kelas** | String 

Response

``` json
{
    "data": [
        {   
            "id_user": 2,
			"nama_member": "Rizki Ramdani",
			"email_member": "ramdani.rizki19@gmail.com",
			"gender": "Laki-laki",
			"umur": 0,
			"alamat": "Dramaga, Kabupaten Bogor",
			"ttl": "",
			"sebagai": "member",
			"kelas": "Tholabul 'Ilm 03",
			"tanggal_daftar": "01-August-2017"
		}
    ]
}
```

## License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
