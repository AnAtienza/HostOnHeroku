@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class = "col-3 p-5">
            <img src = "https://www.freeiconspng.com/thumbs/list-icon/checklist-icon-checklist-icon-png-list-icon-7.png" style = "max-height: 200px">
        </div>

        <div class = "col-9 pt-5">
            <!-- Should be the username -->

            <div class = "d-flex justify-content-between align-items-baseline">
                <div><h1>Community Guidelines</h1></div>
            </div>

            <div class = "d-flex">
                <div class = "pr-5">These are the guidelines for the Etiangge sitw</div>
     
            </div>

            <div>
                <h3>Prohibited Products</h3>
                The following items cannot be sold under any circumstances:
                <ol>
                    <li>Animals as well as their body parts and fluids</li>
                    <li>Adult and explicitly sexual items and media</li>
                    <li>Alcohol</li>
                    <li>Artifacts and other valuable antique items</li>
                    <li>Bladed and blunt weapons</li>
                    <li>Counterfeit goods, unauthorized copies, and unauthorized replicas which violate intellectual property rights</li>
                    <li>Any form of currency, credits, or cards which are used to transfer said currency or credits</li>
                    <li>Defective and recalled items </li>
                    <li>Embargoed goods</li>
                    <li>Explosives</li>
                    <li>Illegal drugs and paraphernalia</li>
                    <li>Firearms and ammunition</li>
                    <li>Any government documentation or identification papers</li>
                    <li>Government property</li>
                    <li>Hazardous materials and used items which may be contaminated by bodily fluids</li>
                    <li>Human body parts, body fluids, and remains</li>
                    <li>Prescription drugs</li>
                    <li>Shares, stocks, bonds, and other securities</li>
                    <li>Stolen goods</li>
                    <li>Tickets to sporting events, concerts, conventions, and similar events</li>
                    <li>Tobacco and related paraphernalia such as vaporizers and electronic cigarettes</li>
                    <li>Tools and devices that are used for, or encourage, illegal activities</li>
                    <li>Vehicles of any form which require registration</li>
                </ol>
            </div>

            <div>
                <h3>Products With Restrictions</h3>
                The following items can be sold but have restrictions:
                <h4>Food and Drink</h4>
                <ol>
                    <li>Any food or drink sold must come in a sealed container</li>
                    <li>A list of all ingredients used must be either on the product itself or the listing for it. The use of unpasteurized dairy must also be specified if applicable</li>
                    <li>A “best by” date (or fair estimate of one) must be either on the product itself or the listing for it</li>
                    <li>Storage instructions (if necessary), must be either on the product itself or the listing for it.</li>
                    <li>Perishable goods must be delivered to the buyer in a container/vessel which provides proper preservation of quality</li>
                    <li>Food and drink which contain ingredients hazardous to human health cannot be sold</li>
                    <li>Expired food and drink cannot be sold</li>
                </ol>
            </div>

            <div>
                <h3>Code of Conduct</h3>
                <ol>
                    <li>The seller must truthfully list the price of their items. It is not allowed to list “dummy prices” for the sake of encouraging engagement/inquiries and negotiation.</li>
                    <li>The user must treat all other users with respect. Disrespect, discrimination, bigotry, and threats of any kind will not be tolerated </li>
                </ol>
            </div>

            <div>
                <h3>Role of Etiangge</h3>
                <ol>
                    <li>E-Tiangge is merely a medium for sellers and buyers to discover and contact each other</li>
                    <li>E-Tiangge does not facilitate the payment process for any product</li>
                    <li>There are no warranties for any product listed on E-Tiangge.</li>
                    <li>Any form of dispute will be settled via arbitration, unless the gravity of the dispute warrants any sort of legal action, which will not be filed by E-Tiangge and instead must be done by one of the involved parties.</li>
                    <li>E-Tiangge reserves the right to take down products and stores, as well as suspend or ban accounts, which violate the guidelines listed within this document</li>

                </ol>
            </div>

        </div>
     </div>
</div>
@endsection
