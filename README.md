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

### Shuffle array
This variable reorganises an array fully so it is also in a different order. You also can limit the array to a few childs after it got reorganised. VERY HANDY!

```twig
{% set stringArray = ['1', '2', '3', '4', '5', '6'] %}

{# craft.handyfunctions.shuffle(array, limit) #}
{% set randomWithLimit = craft.handyfunctions.shuffle(stringArray, 4) %}
{# Result is bv: ['2', '6', '1', '3'] #}

{% set randomWithoutLimit = craft.handyfunctions.shuffle(stringArray) %}
{# Result is bv: ['4', '3', '1', '5', '2', '6'] #}
```

#### Parameters
```twig
{# craft.handyfunctions.shuffle(array, limit) #}
```
| Parameter |                                                           | Datatype | Required |
| --------- | --------------------------------------------------------- | -------- | -------- |
| array     | The array you want to shuffle                             | Array    | yes      |
| limit     | Max amount of direct childs th limit the organised array  | int      | no       |


### Unique array
Remove a duplicate array, string, int or other contents from an array that are the same. It only works on child elements from the array

```twig
{% set notUniqueArray = ['1', '2', '3', '1', '4', '6', '5', '6'] %}

{# craft.handyfunctions.uniqueArray(array) #}
{% set unique = craft.handyfunctions.uniqueArray(stringArray) %}
{# Result is: ['1', '2', '3', '4', '5', '6'] #}
```

#### Parameters
```twig
{# craft.handyfunctions.uniqueArray(array) #}
```
| Parameter |                                          | Datatype | Required |
| --------- | ---------------------------------------- | -------- | -------- |
| array     | The array you want to remove things from | Array    | yes      |  


### Truncate text
With this variable function you can shorten text by using some parameters. You also kan choose what you append after the text like "..."
You can truncate based on character or by word, YOUR CALL!

```twig
{% set text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel eleifend leo, vel posuere purus." %}

{# craft.handyfunctions.truncate(text, based-on, amount, append characters) #}
{% set truncatedText = craft.handyfunctions.truncate(text, 'words', 10, '...') %}
{# Result is: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel..." #}

{% set truncatedText = craft.handyfunctions.truncate(text, 'characters', 10, '...') %}
{# Result is: "Lorem ipsu..." #}
```

#### Parameters
```twig
{# craft.handyfunctions.truncate(text, based-on, amount, append characters) #}
```
| Parameter |                                                              | Datatype                                                | Required | 
| --------- | ------------------------------------------------------------ | ------------------------------------------------------- | --------- |
| text      | The text to truncate                                         | string                                                  | yes        |
| based-on  | Truncate based on words or characters                        | "words", "characters", "character", "letter", "letters" | yes        |
| amount    | Amount of words/characters to display                        | int                                                     | yes        |
| append-characters  | What do you want to append after the truncated text | string                                                  | yes        |


### Craft session variabele
Thanks to this Handy function you can get session details that might get registered by other plugins like Craft Commerce for example. It gets the data of the visitor their Craft session.
<strong>Get a session variable</strong>
```twig
{% set variable = craft.handyfunctions.getSessionVariable('variableName') %}
```
<strong>Set a session variable</strong>
```twig
{% set variable = craft.handyfunctions.setSessionVariable('variableName', 'Ewa nifo') %}
```

#### Parameters
```twig
{# craft.handyfunctions.getSessionVariable('variableName') #}
{# craft.handyfunctions.setSessionVariable('variableName', 'Ewa nifo') #}
```
<strong>Get</strong>
| Parameter    |                | Datatype | Required | 
| ------------ | -------------- | -------- | -------- |
| variableName | Variabele name | string   | yes       |

<strong>Set</strong>
| Parameter    |                       | Datatype | Required | 
| ------------ | --------------------- | -------- | --------- |
| variableName | Variabele name        | string   | yes        |
| content      | New variabele content | string   | yes        |


### Timedifference calculation
With this function you can retrieve the difference between 2 dates. You get a object back with all details about the timedifference. This way you can create things like: "Posted 2 months ago", "commented 1 day ago"
```twig
{# craft.handyfunctions.timeDifference(oldest date, newest date) #}
{% set timeDifference = craft.handyfunctions.timeDifference(item.postDate, now) %}
{# Result is: Object {
    minutes: 0,
    hours: 2,
    days: 7,
    months: 0,
    years: 0
} #}
```

#### Parameters
```twig
{# craft.handyfunctions.timeDifference(oldest date, newest date) #}
```
| Parameter     |             | Datatype   | Required | 
| ------------- | ----------- | ---------- | -------- |
| oldest date   | Oldest date | DateObject | yes       |
| newest date   | Newest date | DateObject | yes       | 


### base64 string
With this function you can encode or decode a string to base64.

```twig
{% set string = "This string can get encoded or decoded in base64" %}

{# craft.handyfunctions.base64Encode(string to be encoded) #}
{% set encodedString = "This string gets encodet to a base64" %}
{# Result is: RGV6ZSBzdHJpbmcgd29yZHQgdmlhIGVlbiBiYXNlNjQgZW5jb2RlZA== #}

{# craft.handyfunctions.base64Decode(string to be decoded) #}
{% set decodedString = craft.handyfunctions.base64Decode(encodedString) %}
{# Result is: "This string gets decodet from base64" #}
```

#### Parameters
```twig
{# craft.handyfunctions.base64Encode(string to be encoded) #}
{# craft.handyfunctions.base64Decode(string to be decoded) #}
```
| Parameter                      |                                      | Datatype | Required | 
| ------------------------------ | ------------------------------------ | -------- | -------- |
| string to be encoded/decoded   | The string you want to encode/decode | string   | yes      |


### bytes to kb, mb, gb
With this function you can convert bytes to other units by only showing 3 characters before the unit gets converted to another. Here are some examples...

```twig
{# set convertedValue = craft.functions.convertBytes(bytes) #}
{# Result is 542000000 -> 542 MB  #}
```

<strong>example: 122000 bytes</strong>
<br/>
122 KB
<br/>
<br/>
<strong>example: 532000000 bytes</strong>
<br/>
532 MB
<br/>
<br/>
<strong>example: 3100000000 bytes</strong>
<br/>
3.1 GB

#### Parameters
```twig
{# craft.functions.convertBytes(bytes) #}
```
| Parameter |                               | Datatype | Required |
| --------- | ----------------------------- | ----------- | --------- |
| bytes     | The bytes you want to convert | string, int | yes        |