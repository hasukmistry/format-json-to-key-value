# About

This program will extract key value pairs from given json. It has capability to navigate to **n level** of nesting to extract pairs.

For example, Lets make a request to url which returns json.

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

# Prerequisite

PHP & composer installed and configured.

Download/Clone this repo and do `composer install`

# How it works?

Run following command from cli,

`php -S localhost:8080`

Navigate to `http://localhost:8080` from your browser.