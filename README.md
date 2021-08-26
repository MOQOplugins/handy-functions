# Handy functions for Craft CMS 3.x

A kickstart plugin for your craft project where you can use some of the most handy functions that are easy accessible with this plugin.
Sidenote: some things might already be possible within twig, these just can be handy of course!

![Screenshot](resources/img/plugin-logo.png)

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

Go in your Control Panel to Plugin store and search and install the "Handy Functions" plugin

OR

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require MOQObe/moqo

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Moqo.

## Workflow

::: tab Shufflen van een array
```twig
{% set stringArray = ['1', '2', '3', '4', '5', '6'] %}

{# craft.moqo.shuffle(array, limit) #}
{% set randomWithLimit = craft.moqo.shuffle(stringArray, 4) %}
{# Resultaat is bv: ['2', '6', '1', '3'] #}

{% set randomWithoutLimit = craft.moqo.shuffle(stringArray) %}
{# Resultaat is bv: ['4', '3', '1', '5', '2', '6'] #}
```
Deze variabele reorganiseert een Array volledig waardoor alles altijd in een andere volgorde staat. Je kunt ook een limit toekennen aan de variabele waardoor enkel de eerste aantal die je wenst van de geshuffelde array, worden weergegeven

### Parameters
```twig
{# craft.moqo.shuffle(array, limit) #}
```
| Parameter |                                               | Verwachte inhoud | Verplicht |
| --------- | --------------------------------------------- | ---------------- | --------- |
| array     | De array die je wenst te shufflen             | Array            | ja        |
| limit     | Max aantal items nadat de array is geshuffelt | int              | nee       |

:::

::: tab Array items uniek maken
```twig
{% set notUniqueArray = ['1', '2', '3', '1', '4', '6', '5', '6'] %}

{# craft.moqo.uniqueArray(array) #}
{% set unique = craft.moqo.uniqueArray(stringArray) %}
{# Resultaat is: ['1', '2', '3', '4', '5', '6'] #}
```
Hiermee kan je dezelfde items uit de array weghalen.

### Parameters
```twig
{# craft.moqo.uniqueArray(array) #}
```
| Parameter |                                               | Verwachte inhoud | Verplicht |
| --------- | --------------------------------------------- | ---------------- | --------- |
| array     | De array die je wenst te filteren             | Array            | ja        |  

:::

::: tab Truncate tekst
```twig
{% set text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel eleifend leo, vel posuere purus." %}

{# craft.moqo.truncate(text, based-on, amount, append characters) #}
{% set truncatedText = craft.moqo.truncate(text, 'words', 10, '...') %}
{# Resultaat is: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel..." #}

{% set truncatedText = craft.moqo.truncate(text, 'characters', 10, '...') %}
{# Resultaat is: "Lorem ipsu..." #}
```
Met dit kan je eenvoudig je tekst inkorten op basis van enkele parameters. Je kan dan ook kiezen wat je er na zet zoals het veel voorkomende "..."

### Parameters
```twig
{# craft.moqo.truncate(text, based-on, amount, append characters) #}
```
| Parameter |                                                     | Verwachte inhoud                                        | Verplicht | 
| --------- | --------------------------------------------------- | ------------------------------------------------------- | --------- |
| text      | De tekst die je wenst te afkorten                   | string                                                  | ja        |
| based-on  | Afkorten op woorden of karakters                    | "words", "characters", "character", "letter", "letters" | ja        |
| amount    | Aantal woorden/karakters die je wenst weer te geven | int                                                     | ja        |
| append-characters  | Wat je wenst toe te voegen na het afbreken | string                                                  | ja        |

:::

::: tab Craft session variabele
<strong>Ophalen van een craft session variabele</strong>
```twig
{% set variable = craft.moqo.getSessionVariable('variableName') %}
```
<strong>Instellen van een craft session variabele</strong> (Zal je waarschijnlijk nooit moeten doen)
```twig
{% set variable = craft.moqo.setSessionVariable('variableName', 'Ewa nifo') %}
```
a.d.h.v. deze craft session functies kan je zaken ophalen die misschien door andere plugins worden geregistreerd of door craft zelf. Om kortweg een voorbeeld te geven van zaken die in de craft sessie zitten is de login van de admin.

### Parameters
```twig
{# craft.moqo.getSessionVariable('variableName') #}
{# craft.moqo.setSessionVariable('variableName', 'Ewa nifo') #}
```
<strong>Get</strong>
| Parameter    |                | Verwachte inhoud | Verplicht | 
| ------------ | -------------- | ---------------- | --------- |
| variableName | Variabele naam | string           | ja        |

<strong>Set</strong>
| Parameter    |                  | Verwachte inhoud | Verplicht | 
| ------------ | ---------------- | ---------------- | --------- |
| variableName | Variabele naam   | string           | ja        |
| content      | Variabele inhoud | string           | ja        |
:::

::: tab Tijdsverschil berekenen
```twig
{# craft.moqo.timeDifference(oldest date, newest date) #}
{% set timeDifference = craft.moqo.timeDifference(item.postDate, now) %}
{# Resultaat is: Object {
    minutes: 0,
    hours: 2,
    days: 7,
    months: 0,
    years: 0
} #}
```
Met deze variabele kan je ophalen wat het verschil is tussen 2 datums. Je krijgt hier een object terug met meer details omtrent het tijdsverschil. Hiermee kan je zaken creëeren zoals "2 maanden geleden gepost", "1 dag geleden gepost", ...

### Parameters
```twig
{# craft.moqo.timeDifference(oldest date, newest date) #}
```
| Parameter     |                | Verwachte inhoud | Verplicht | 
| ------------- | -------------- | ---------------- | --------- |
| oldest date   | Oudste datum   | DateObject       | ja        |
| newest date   | Nieuwste datum | DateObject       | ja        |
:::

::: tab base64 string
```twig
{% set string = "Deze string wordt via een base64 encoded" %}

{# craft.moqo.base64Encode(string to be encoded) #}
{% set encodedString = craft.moqo.base64Encode(string) %}
{# Resultaat is: RGV6ZSBzdHJpbmcgd29yZHQgdmlhIGVlbiBiYXNlNjQgZW5jb2RlZA== #}

{# craft.moqo.base64Decode(string to be decoded) #}
{% set decodedString = craft.moqo.base64Decode(encodedString) %}
{# Resultaat is: "Deze string wordt via een base64 encoded" #}
```
Met deze variabele kan een string encoded/gedecodet worden.

### Parameters
```twig
{# craft.moqo.base64Encode(string to be encoded) #}
{# craft.moqo.base64Decode(string to be decoded) #}
```
| Parameter     |                | Verwachte inhoud | Verplicht | 
| ------------------------------ | --------------------------------------- | -------| -- |
| string to be encoded/decoded   | De string die je wilt encoden/decoden   | string | ja |
:::

::: tab bytes -> kb, mb, gb
```twig
{# set convertedValue = craft.functions.convertBytes(bytes) #}
{# Resultaat is 542000000 -> 542 MB  #}
```
Hiermee kan je bytes omzetten naar een andere eenheid met max. 3 karakters voor een andere eenheid zal worden geregistreerd (kb, mb, gb)

<strong>vb. 122000 bytes</strong>
<br/>
122 KB
<br/>
<br/>
<strong>vb. 532000000 bytes</strong>
<br/>
532 MB
<br/>
<br/>
<strong>vb. 3100000000 bytes</strong>
<br/>
3.1 GB

### Parameters
```twig
{# craft.functions.convertBytes(bytes) #}
```
| Parameter |                                               | Verwachte inhoud | Verplicht |
| --------- | --------------------------------------------- | ---------------- | --------- |
| bytes     | Het aantal bytes die je wenst te laten converteren | string, int | ja        |

:::

::::