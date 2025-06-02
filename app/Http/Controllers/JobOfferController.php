<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobOfferController extends Controller{

    protected $jobOfferService;

    public function __construct($jobOfferService){
        $this->jobOfferService = $jobOfferService;
    }

    public function index(){
        $jobOffers = $this->jobOfferService->getAllJobOffers();
        return response()->json($jobOffers);
    }

    public function show($id){
        $jobOffer = $this->jobOfferService->getJobOfferById($id);
        if(!$jobOffer){
            return response()->json(['message' => 'Job offer not found'], 404);
        }
        return response()->json($jobOffer);
    }

    public function store(Request $request){
        $data = $request->all();
        $jobOffer = $this->jobOfferService->createJobOffer($data);
        return response()->json($jobOffer, 201);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $jobOffer = $this->jobOfferService->updateJobOffer($id, $data);
        if(!$jobOffer){
            return response()->json(['message' => 'Job offer not found'], 404);
        }
        return response()->json($jobOffer);
    }

    public function destroy($id){
        $this->jobOfferService->deleteJobOffer($id);
        return response()->json(['message' => 'Job offer deleted successfully']);
    }

    public function getJobOfferBySlug($slug){
        $jobOffer = $this->jobOfferService->getJobOfferBySlug($slug);
        if(!$jobOffer){
            return response()->json(['message' => 'Job offer not found'], 404);
        }
        return response()->json($jobOffer);
    }

    public function getUserJobOffers($userId){
        $jobOffers = $this->jobOfferService->getUserJobOffers($userId);
        return response()->json($jobOffers);
    }

}
