<?php

/**
 * Core class file to extract response.
*/
if ( ! class_exists( 'ClassExtract' ) ) :
	/**
	 * Class defination for extracting response.
	 */
	class ClassExtract {
		/**
		 * Default constructor
		 */
		public function __construct() {}

		/**
		 * This function is for navigating and extracting from each nested level of given response.
		 *
		 * @param Array $item containing key value pairs.
		 * @param Int   $parent for nesting key value pairs.
		 * @return Array
		 */
		public function extract_response( $item, $parent = 0 ) {
			$data = [];
			foreach ( $item as $key => $value ) {
				if ( is_object( $value ) && $value instanceof stdClass ) {
					$data[] = [
						'key'    => $key,
						'value'  => $this->extract_response( $value, $parent++ ),
						'type'   => 'OBJECT',
						'parent' => $parent,
					];
				} else if ( is_array( $value ) ) {
					$data[] = [
						'key'    => $key,
						'value'  => $this->extract_response( $value, $parent++ ),
						'type'   => 'ARRAY',
						'parent' => $parent,
					];
				} else {
					$data_type = 'text';
					if ( is_numeric( $value ) ) {
						$data_type = 'number';
					} else if ( is_bool( $value ) === true ) {
						$data_type = 'boolean';
					} else if ( is_null( $value ) ) {
						$data_type = 'null';
					}

					$data[] = [
						'key'    => $key,
						'value'  => $value,
						'type'   => $data_type,
						'parent' => $parent,
					];
				}
			}
			return $data;
		}
	}
endif;
