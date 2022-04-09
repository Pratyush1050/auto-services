<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\AutoPart;
use App\Models\Client;
use App\Models\Gallery;
use App\Models\Testimonial;
use App\Models\Contact;
use App\Models\Facility;
use App\Models\Notification;
use App\Models\Service;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $testimonials = $this->getTestimonials();
        $galleryImages = $this->getGalleryImages();
        $aboutUs = $this->getAboutUs();
        $clients = $this->getClients();
        $autoPart = $this->getAutoParts();
        $telephone = $this->getTelephone();
        $mobileNumbers = $this->getMobileNumber();
        $notification = $this->getNotification();
        $bannerNotification = $this->getBannerNotification();
        $services = $this->getServices();
        $facility = $this->getFacility();
        $fax = $this->getFax();

        return view('index',compact(
            'testimonials',
            'galleryImages',
            'aboutUs',
            'clients',
            'autoPart',
            'telephone',
            'mobileNumbers',
            'notification',
            'bannerNotification',
            'services',
            'facility',
            'fax'
        ));
    }

    private function getTestimonials()
    {
        $testimonials = Testimonial::all();

        return $testimonials;
    }

    private function getGalleryImages()
    {
        $images = Gallery::where('status','show')->get();

        return $images;
    }

    private function getAboutUs()
    {
        $aboutUs = AboutUs::all();

        return $aboutUs;

    }

    private function getClients()
    {
        $clients = Client::where('status','show')->get();

        return $clients;
    }

    private function getAutoParts()
    {
        $autoPart = AutoPart::where('status','show')->first();

        return $autoPart;
    }

    private function getTelephone()
    {
        $telephone = Contact::where('contact_type','telephone')->first();

        return $telephone;
    }

    private function getMobileNumber()
    {
        $mobileNumber = Contact::where('contact_type','mobile')->get();

        return $mobileNumber;
    }

    private function getFax()
    {
        $fax = Contact::where('contact_type', 'fax')->first();

        return $fax;
    }

    private function getNotification()
    {
        $notification = Notification::where('type','notification')->first();

        return $notification;

    }

    private function getBannerNotification()
    {
        $bannerNotification =  Notification::where('type','banner')->get();

        return $bannerNotification;
    }

    private function getServices()
    {
        $services = Service::all();

        return $services;
    }

    private function getFacility()
    {
        $facility = Facility::where('status','show')->orderBy('created_at','desc')->first();
        return $facility;
    }
}
