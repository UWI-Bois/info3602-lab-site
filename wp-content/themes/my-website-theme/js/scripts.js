// 3rd party packages from NPM
import $ from 'jquery';
import slick from 'slick-carousel';

// Our modules / classes
import MobileMenu from './modules/MobileMenu';
import HeroSlider from './modules/HeroSlider';
import Search from './modules/Search';
import MyNotes from './modules/MyNotes';

// Instantiate a new object using our modules/classes
var mobileMenu = new MobileMenu();
var heroSlider = new HeroSlider();
var search = new Search();
var mynotes = new MyNotes();

console.log("scripts.js says hi :)");

// lab 13
import Lab13 from './modules/Lab13';
var lab13 = new Lab13();