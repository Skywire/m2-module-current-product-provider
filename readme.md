# Current Product Data Provider

A data provider and view model for the current product on the PDP.

Based on and modified from https://github.com/Vinai/module-current-product-example

# Process

The product instance takes the following path until it reaches the template:  

`Product Helper -> Event -> Observer -> Custom Data Provider Object -> View Model -> Template`


1. The product is loaded by `\Magento\Catalog\Helper\Product::initProduct`.
   This method dispatches the event `catalog_controller_product_init_after`.
   
2. In the event observer `RegisterCurrentProductObserver` the product is set on a shared instance of
   the class `\Skywire\CurrentProductProvider\DataProvider\CurrentProduct`.
   
3. A new template block is added to the product detail page with layout XML.
   In the XML the block is configured to receive a view model,
   an instance of the class `\Skywire\CurrentProductProvider\ViewModel\CurrentProduct`.
   
4. The view model uses the shared `DataProvider\CurrentProduct` instance to
   retrieve the current product. This makes it a registry but without
   the downsides of the global core registry.
   
5. The template retrieves the view model from the block and renders the required product values.