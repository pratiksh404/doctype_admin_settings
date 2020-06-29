![Doctype Admin Setting](https://github.com/pratiksh404/doctype_admin_settings/blob/master/screenshots/doctype_admin_settings.jpg)
[![Issues](https://img.shields.io/github/issues/pratiksh404/doctype_admin_settings)](https://github.com/pratiksh404/doctype_admin_settings/issues)
[![Stars](https://img.shields.io/github/stars/pratiksh404/doctype_admin_settings)](https://github.com/pratiksh404/doctype_admin_settings/stargazers)

## Laravel 7 Admin Panel Settings Plugin for lazy developers.

#### Contains : -

- Setting Management System

### Installation

Run Composer Require Command

```sh
composer require doctype_admin/Settings
```

## Then migrate database

```sh
php artisan migrate
```

This Package includes two seed

- PostsTableSeeder
- CategoriesTableSeeder

To use specific seed use(publish them first)

```sh
php artisan db:seed --class=CategoriesTableSeeder //Seed this first
php artisan db:seed --class=PostsTableSeeder // And then this
```

### If you want to modify Stuffs do..

### Install package assets

#### Install all assets

```sh
php artisan DoctypeAdminSetting:install -a
```

This command will publish

- config file named Setting.php
- views files of setting
- migrations files
- seed files

#### Install config file only

```sh
php artisan DoctypeAdminSetting:install -c
```

#### Install view files only

```sh
php artisan DoctypeAdminSetting:install -f
```

#### Install migrations files only

```sh
php artisan DoctypeAdminSetting:install -m
```

#### Install seed files only

```sh
php artisan DoctypeAdminSetting:install -d
```

## Note

If seed class is not found try running composer dump-autoload

## To add the package route link to be accesable from sidemenu just add following on config/adminlte.php under key 'menu'

```sh
        [
            'text' => 'Setting',
            'icon' => 'fas fa-cog',
            'url' => 'admin/setting'
        ],
```

## Setting Plugin Consists following input fields

- Text Field
- Rich Textarea
- Image
- Select
- Radio
- Checkbox

## How to access setting value ?

We can access setting's assigned value globally by simply using blade directive like

```sh
{{@setting('setting_name')}} // setting_name is one you make while you are creating setting (should be lower cap with space replaced by underscore(_) : Recommended)
```

## e.g

if we have a setting and you name that setting "Site name" then to use the value assigned to that setting use

```sh
{{@setting('site_name')}}
```

## Customization

It uses JSON object to customize the input fields.

## Customization Objects

| Objects     | Function                                                                        |
| ----------- | ------------------------------------------------------------------------------- |
| value       | Retives all featured posts                                                      |
| placeholder | Gives the input field placeholder                                               |
| class       | Adds the given class                                                            |
| id          | Adds the given id                                                               |
| style       | Gives the styling                                                               |
| default     | Makes the mention value as default value eg like in select dropdown or checkbox |
| checked     | Makes the checkbox checked as default                                           |
| options     | Options given for select options, radio options                                 |

## Example

Simple Text Field Setting Customization

```sh
{
  "class" : "my_class",
  "id" : "my_id",
  "value" : "Doctype Admin",
  "placeholder" : "Site Title Here!!",
  "style" : {
    "color" : "red"
  }
}
```

Simple Rich Textarea Setting Customization

```sh
{
  "class" : "my_class",
  "id" : "another_id",
  "placeholder" : "Rich Text Placeholder",
  "style" : {
    "color" : "red"
  }
```

Simple Select Field Setting Customization

```sh
{
  "default" : "1",
  "options" : {
    "1" : "option 1",
    "2" : "option 2"
  }
}
```

Simple Radio Field Setting Customization
Note type object is mandatory defining whetjer the value to be stored is integer or string type

```sh
{
  "type" : "integer",
   "checked" : "1",
  "options" : {
  "1" : "Pratik Shrestha",
  "2" : "DRH2SO4"
            },
"style": {
  "color" : "red"
      }
}
```

Simple Image Field Setting Customization

```sh
{
  "image" : {
    "fit" : {
      "width" : "300",
      "height" : "300"
    },
    "quality" : "80"
  }
}
```

## Note

When using select and radio giving options object in customization is mandatory

### Admin Panel Screenshot

![Doctype Admin Setting](https://github.com/pratiksh404/doctype_admin_settings/blob/master/screenshots/setting.jpg)
![Doctype Admin Setting](https://github.com/pratiksh404/doctype_admin_settings/blob/master/screenshots/setting_make.jpg)
![Doctype Admin Setting](https://github.com/pratiksh404/doctype_admin_settings/blob/master/screenshots/setting_custom.jpg)

### Todos

- Better Confile File Control
- Maintainabilty
- More flexible customization
- Adding Exceptions

## Package Used

- http://image.intervention.io/

## License

MIT

**DOCTYPE NEPAL ||DR.H2SO4**
