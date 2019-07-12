<?php

use Behat\Mink\Exception\DriverException;
use Behat\Mink\Exception\UnsupportedDriverActionException;


/**
 * Defines application features from the specific context.
 *
 * @author Dmytro ANDROSHCHUK <androshchuk.d@gmail.com>
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class FeatureContext extends BaseContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()

    {
    }

    /**
     * @BeforeScenario
     * @throws DriverException
     * @throws UnsupportedDriverActionException
     */
    public function beforeScenario(): void
    {
        $this->getSession()->getDriver()->resizeWindow(1920, 1080);
    }

    /**
     * @When /^wait (\d+) seconds$/
     * @param $pause
     */
    public function wait($pause): void
    {
        $this->getSession()->wait($pause * 1000);
    }

    /**
     * @When I check :label checkbox
     * @param $label
     */
    public function iCheckCheckbox($label): void
    {
        $labelElement = $this->getSession()->getPage()->find('xpath', sprintf("//label[contains(., '%s')]", $label));
        $labelElement->click();
    }

    /**
     * @When I chose any size
     */
    public function iChoseAnySize(): void
    {
        $sizesList = $this->getSession()->getPage()->findAll('css', '.swatch-option');
        $selector = '.swatch-option:nth-child('.random_int(1, count($sizesList)).')';
        $size = $this->getSession()->getPage()->find('css', $selector);

        $size->click();
    }

    /**
     * @When I chose any color
     */
    public function iChoseAnyColor(): void
    {
        $colorsList = $this->getSession()->getPage()->findAll('css', '.swatch-select>option');
        $selector = '.swatch-select>option:nth-child('.random_int(2, count($colorsList)).')';
        $color = $this->getSession()->getPage()->find('css', $selector);

        $color->click();
    }

    /**
     * @When I chose any shipping method
     */
    public function iChoseAnyShippingMethod(): void
    {
        $shippingMethodsList = $this->getSession()->getPage()->findAll('css', 'input[type="radio"]');
        $index = random_int(1, count($shippingMethodsList));
        $iterator = 1;
        foreach ($shippingMethodsList AS $shippingMethod) {
            if ($iterator === $index) {
                $shippingMethod->click();
                continue;
            }
            $iterator++;
        }
    }

    /**
     * @When I add product to cart
     */
    public function iAddProductToCart(): void
    {
        $addProductToCart = $this->getSession()->getPage()->findButton('product-addtocart-button');

        $addProductToCart->click();
    }

    /**
     * @When I open :position filter
     * @param $position
     */
    public function iOpenAllFilters($position): void
    {
        $selector = '.filter-options-item:nth-child(' . $position . ')';
        $element = $this->getSession()->getPage()->find('css', $selector);

        $element->click();
    }

    /**
     * @Then I click any product
     */
    public function iClickAnyProduct(): void
    {
        $productsList = $this->getSession()->getPage()->findAll('css', '.product-item');
        $selector = '.product-item:nth-child('.random_int(1, count($productsList)).')';
        $this->iScrollElementIntoView($selector);
        $this->getSession()->wait(2000);
        $product = $this->getSession()->getPage()->find('css', $selector);
        $product->doubleClick();
    }

    /**
     * Scroll HTML element  into view
     *
     * @Then I scroll element :cssSelector into view
     * @param $cssSelector
     * @throws Exception
     */
    public function iScrollElementIntoView($cssSelector): void
    {
        $this->scrollHtmlElementIntoView($cssSelector);
    }

    /**
     * Reset Session
     *
     * @Then I reset session
     */
    public function iResetSession(): void
    {
        $this->getMink()->getSession()->restart();
    }

    /**
     * Scroll HTML element with the supplied ID in view so that you can click on it (for example)
     *
     * @param $cssSelector
     * @throws Exception
     */
    public function scrollHtmlElementIntoView($cssSelector): void
    {
        $function = <<<JS
    (
        jQuery(document).ready(function($) {

            let elem = $('$cssSelector');
      $('html, body').animate({scrollTop:elem.offset().top})
    }
    ));
JS;
        try {
            $this->getSession()->executeScript($function);
        } catch (Exception $e) {
            print_r($e->getMessage());
            throw new \RuntimeException('Scroll Into View failed');
        }
    }
}

