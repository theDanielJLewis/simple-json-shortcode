# Simple JSON Shortcode plugin for WordPress

Use a WordPress shortcode to display a single piece of data from a JSON URL. 

Created by Daniel J. Lewis from [_The Audacity to Podcast_](https://theaudacitytopodcast.com/).

## Installation

1. Download the zip.
2. Install it as a WordPress plugin.
3. Activate it.

## Usage

There are currently no settings to configure this simple plugin and its features are very limited right now. Use it by adding a shortcode and two attributes:

`[sjsons url="URL_HERE" path="PATH_HERE"]`

Replace `URL_HERE` with the URL to the JSON data you want to display.

Replace `PATH_HERE` with the path to the value you want returned.

## Examples

### Array of objects

```json
[
  {
    "label": "Letters in the English alphabet",
    "total": 26,
    "vowels": 5,
    "consonants": 21,
  },
  {
	"label": "Digits on one hand",
	"fingers": 4,
	"thumbs": 1
  }
]
```

`[sjsons url="URL_HERE" path="0.total"]` ➜ `26`

`[sjsons url="URL_HERE" path="1.label"]` ➜ `Digits on one hand`

### Objects with arrays

```json
{
	"title": "The Audacity to Podcast",
	"host": "Daniel J. Lewis",
	"topics": [
		"podcasting",
		"audio gear",
		"audio editing",
		"marketing",
		"monetization",
		"WordPress",
	],
	"yearStarted": 2010,
}
```

`[sjsons url="URL_HERE" path="title"]` ➜ `The Audacity to Podcast`

`[sjsons url="URL_HERE" path="topics.0"]` ➜ `podcasting`

## License

Licensed under GNU GPL v2.0.