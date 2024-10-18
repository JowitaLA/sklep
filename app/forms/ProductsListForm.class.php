<?php

namespace app\forms;

class ProductsListForm {
	/* Tabela `categories` (c_...) */
	public $c_id;
	public $c_name;
	public $c_description;
	public $c_icon;

	/* Tabela `products` (p_...) */
	public $p_id;
	public $p_name;
	public $p_description;
	public $p_image;
	public $p_amount;
	public $p_price;

	/* Tabela `product_ratings` (pr_...) */
	public $pr_id;
	public $pr_id_p;
	public $pr_rating;
	public $pr_review;
	
	/* Tabela `categories_products` (cp_...) */
	public $cp_id;
	public $cp_id_c;
	public $cp_id_p;
} 