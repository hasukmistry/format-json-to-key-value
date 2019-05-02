# About

This program will extract key value pairs from given json. It has capability to navigate to **n level** of nesting to extract pairs.

# What makes this different or interesting?

I was working on wordpress project with rest api enabled. And Wordpress takes too much time to generate api response. Ideal time for generating api response should be around **200ms**.

I was looking for a way to optimize this and make it faster. This is how I got an idea to save json to database. Here, I isolated my function for extracting key value pairs for any given json api.

I will be more than happy to resolve issues regarding this.

# Prerequisite

PHP & composer installed and configured.

Download/Clone this repo and do `composer install`

# Quick nice explanation

Lets first make a request to url which returns json.

```
$req = new ClassUrl();

// Sample url to make request.

$result = $req->get_response( 'https://jsonplaceholder.typicode.com/users', $host = 'jsonplaceholder.typicode.com' );
```

Now, lets create an object of ClassExtract.

```
$ext = new ClassExtract();
```

Following code will illustrate an use for key value extraction.

```
if ( ! empty( $result['success'] ) ) {
	$res = $ext->extract_response( $result['body'] );
	foreach ( $res as $item ) {
		var_dump( $item );
	}
}
```

# How it works?

Run following command from cli,

`php -S localhost:8080`

Navigate to `http://localhost:8080` from your browser.