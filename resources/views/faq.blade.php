@extends('layouts.app')

@section('content')
<div class="container my-5 pt-4">
    <h2 class="text-center fw-bold mb-4"><i class="fa-solid fa-question-circle text-danger"></i> Frequently Asked Questions</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="accordion" id="faqAccordion">
                <!-- FAQ 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq1-heading">
                        <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true" aria-controls="faq1">
                            How do I rent a dress from ChicRental?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" aria-labelledby="faq1-heading" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Browse our collection, select your desired item, choose rental dates, and proceed to checkout. You will get a confirmation and delivery details after payment.
                        </div>
                    </div>
                </div>
                <!-- FAQ 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq2-heading">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                            Do you have both men's and women's collections?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" aria-labelledby="faq2-heading" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes, we offer premium collections for both men and women—including dresses, sherwani, sarees, gowns, and even ornaments.
                        </div>
                    </div>
                </div>
                <!-- FAQ 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq3-heading">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                            Is everything branded and quality checked?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" aria-labelledby="faq3-heading" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Absolutely! All our products are verified and quality checked before each delivery.
                        </div>
                    </div>
                </div>
                <!-- FAQ 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq4-heading">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                            What happens if I damage a rented item?
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" aria-labelledby="faq4-heading" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Please contact us as soon as possible. Minor wear is usually fine, but significant damage may incur a repair or replacement fee as per our terms.
                        </div>
                    </div>
                </div>
                <!-- FAQ 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq5-heading">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false" aria-controls="faq5">
                            How do I return the rented dress or ornaments?
                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse" aria-labelledby="faq5-heading" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Simply pack the items in the original package and our delivery partner will pick them up from your address on the scheduled return date.
                        </div>
                    </div>
                </div>
                <!-- FAQ 6 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq6-heading">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq6" aria-expanded="false" aria-controls="faq6">
                            Can I cancel or reschedule my booking?
                        </button>
                    </h2>
                    <div id="faq6" class="accordion-collapse collapse" aria-labelledby="faq6-heading" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes, you can cancel or reschedule as per our policy. Please contact us at least 24 hours before your delivery date for hassle-free changes.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection