@extends('layouts.app')
@section('content')
<!-- Breadcrumb Navigation Bar -->
      <section class="w-full bg-surface shadow-sm relative overflow-hidden">
        <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin pt-space-lg pb-space-md relative z-10">
          <!-- Breadcrumb Navigation -->
          <nav aria-label="Breadcrumb"
            class="flex flex-wrap items-center justify-start gap-space-xs text-on-surface-variant font-label-md text-label-md">
            <a class="hover:text-primary transition-colors" href="#">Home</a>
            <span aria-hidden="true">/</span>
            <a class="hover:text-primary transition-colors" href="#">Products</a>
            <span aria-hidden="true" class="hidden sm:inline">/</span>
            <a class="hover:text-primary transition-colors hidden sm:inline" href="#">Hydraulic Assemblies</a>
            <span aria-hidden="true">/</span>
            <span class="text-primary font-bold min-w-0 max-w-full truncate" aria-current="page">HP-4200 Axial Piston Pump</span>
          </nav>
        </div>
      </section>
      <!-- Main Product Detail Showcase Section -->
      <section class="w-full py-space-xl">
        <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">
            <!-- LEFT COLUMN: Product Gallery (Extra Large Main + 4 Medium Thumbnails) -->
            <div class="lg:col-span-7 flex flex-col gap-space-md">
              <!-- Main Large Display Container -->
              <div
                class="relative bg-surface-container-lowest rounded-md p-space-md shadow-md overflow-hidden group">
                <!-- Badges Bar -->

                <!-- Zoom & Inspect Controls -->

                <!-- Extra Size Main Product Viewport -->
                <div
                  class="relative w-full h-[440px] md:h-[520px] rounded-md overflow-hidden bg-surface-container-high flex items-center justify-center cursor-crosshair">
                  <img
                    alt="Heavy crawler excavator hydraulic undercarriage and main chassis during dynamometer load testing inside a heavy machinery plant."
                    class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105"
                    data-alt="Heavy crawler excavator hydraulic undercarriage and main chassis during dynamometer load testing inside a heavy machinery plant."
                    id="mainProductImg" src="placeholder" style="opacity: 1;">

                </div>
              </div>
              <!-- Secondary Medium Thumbnail Gallery -->
              <div class="grid grid-cols-4 gap-space-sm" id="thumbGallery">
                <!-- Thumb 1 -->
                <button
                  class="thumb-btn text-left p-1 rounded-md bg-surface-container-lowest shadow-sm hover:shadow transition-all group overflow-hidden"
                  data-img-alt="Detailed macro angle of hydraulic valve block manifold and precision port connectors on an industrial test bench with pressure readouts and steel tubing."
                  data-img-src="placeholder" data-title="Control Valve Manifold">
                  <div class="relative w-full h-24 rounded-md overflow-hidden bg-surface-container">
                    <img alt="Control Valve Port Array"
                      class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                      data-alt="Detailed macro angle of hydraulic valve block manifold and precision port connectors on an industrial test bench with pressure readouts and steel tubing."
                      src="https://lh3.googleusercontent.com/aida-public/AB6AXuB9vrH5tt2HqAviNzemESs4N4JM4087PwagcSKtHfKX8_eXAZ6e7BJLrfO0R3z81knOCfxpEJHkTO6Ib-bpi_BMB8fT9fekn6igDnzXn1ZFeYYoNrfffexlQyu6iwMkT6JnLqnqJSO7xRwhBmtZR5nUURMcvtKKkMVR8cyP5pbTqNxpDIb97OXVIm-5WPtbreQYNz4-YHPRnpIoAQseyeUJynnBOFg5gIS6nRDP19st">

                  </div>
                </button>
                <!-- Thumb 2 -->
                <button
                  class="thumb-btn text-left p-1 rounded-md bg-surface-container-lowest shadow-sm hover:shadow transition-all group overflow-hidden"
                  data-img-alt="Exploded technical CAD cross-section render of heavy machinery rotating swashplate and 9-piston axial barrel assembly with dimensional callouts and metallurgy labels."
                  data-img-src="placeholder" data-title="Internal Swashplate CAD">
                  <div class="relative w-full h-24 rounded-md overflow-hidden bg-surface-container">
                    <img alt="Exploded Internal CAD"
                      class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                      data-alt="Exploded technical CAD cross-section render of heavy machinery rotating swashplate and 9-piston axial barrel assembly with dimensional callouts and metallurgy labels."
                      src="https://lh3.googleusercontent.com/aida-public/AB6AXuBA41c5y8JcnKxudHa_jO-ErCkb-zbvmcueajkUobasySiuM0gXwsjqNNcL8HnmDMisIuoHKW9VxHDNb87xIJLLiA16ns9ovb30866XS8zLxqp80ruB2-Gy3Sij3Z8KFI3Ablnlll7W65zcOFpiOQAIuPmT4-a2YtX8MDLtK3OLLIN19hJFk2DDLGXGrST-yXM25xLeCaIjsRlJJvnnXt6jnBTKbiGDvR7yemnBLhC8">

                  </div>
                </button>
                <!-- Thumb 3 -->
                <button
                  class="thumb-btn text-left p-1 rounded-md bg-surface-container-lowest shadow-sm hover:shadow transition-all group overflow-hidden"
                  data-img-alt="Heavy steel 14-tooth involute spline shaft and SAE 4-bolt D-pattern mounting flange face on industrial assembly table with machined bevels."
                  data-img-src="placeholder" data-title="Spline Drive Shaft &amp; Flange">
                  <div class="relative w-full h-24 rounded-md overflow-hidden bg-surface-container">
                    <img alt="Drive Shaft Spline View"
                      class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                      data-alt="Heavy steel 14-tooth involute spline shaft and SAE 4-bolt D-pattern mounting flange face on industrial assembly table with machined bevels."
                      src="https://lh3.googleusercontent.com/aida-public/AB6AXuABqbORmRur_18f3x4OIKy8B4Os7WeVEjcMSyJNyag2EEDy_R3Fo1x4AxlcJXpLgLiJSp8hSg93newpv8K5GZxjArIxbe8ELQ1brfMkkXdeu73-eaLvBhfDvYzX_0nBSiYPArK_-pV3g-GmrOGifIXL0tQ8MrjZmZxsmsfA5IjnSmhG8cKwhJa05E8VIDmwjFWT13JRlXuEwJm3kRgcyGfTGW09WG8WbnR6CWiRxPlZ">

                  </div>
                </button>
                <!-- Thumb 4 -->
                <button
                  class="thumb-btn text-left p-1 rounded-md bg-surface-container-lowest shadow-sm hover:shadow transition-all group overflow-hidden ring-2 ring-primary bg-surface-container-high"
                  data-img-alt="Heavy crawler excavator hydraulic undercarriage and main chassis during dynamometer load testing inside a heavy machinery plant."
                  data-img-src="placeholder" data-title="Bench Load Test">
                  <div class="relative w-full h-24 rounded-md overflow-hidden bg-surface-container">
                    <img alt="Testing Bench Setup"
                      class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                      data-alt="Heavy crawler excavator hydraulic undercarriage and main chassis during dynamometer load testing inside a heavy machinery plant."
                      src="https://lh3.googleusercontent.com/aida-public/AB6AXuCzzgOcYOKCRLjzJUgEDb4SavYG9JtgAptsc78Nsu8J8yMW8d1oKHL4L_xNOzclcXouL2e4E2-mwpeJNQw7XBWFpSnfB3NcmjFAO721O48-mtZPKZF83V-g24ia9t8fdj5CGjeCyXYejU8O7DkQcIWzWnpu3ZLWyEzqtb-qCcjFpiDJEJD5TO-OfzhIYa7hKtzq_79evi-opayCZo6CcdUoeTdMDqnrmR42x0kKCvy4">

                  </div>
                </button>
              </div>
              <!-- Direct Operational Assurance Metrics Strip -->

            </div>
            <!-- RIGHT COLUMN: Core Product Information & Commercial Ordering Desk -->
            <div class="lg:col-span-5 flex flex-col gap-space-md">
              <!-- Category & Metadata Header -->
              <div class="flex flex-col gap-space-xs">

                <h1 class="font-headline-lg text-headline-lg text-on-surface font-extrabold tracking-tight">
                  HP-4200 Axial Piston High-Pressure Pump Unit
                </h1>

              </div>
              <!-- Commercial Pricing & RFQ Strip -->

              <!-- Product Description (Deskripsi) -->
              <div class="flex flex-col gap-space-xs">
                <h2 class="font-label-lg text-label-lg font-bold uppercase tracking-wider text-on-surface">Description
                </h2>
                <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                  Heavy-duty variable displacement axial piston pump engineered specifically for extreme hydraulic
                  excavator operations, continuous high-pressure fluid transfer, and harsh mining environments with
                  minimal thermal degradation. Built with high-grade spheroidal graphite iron casting and integrated
                  charge relief manifolds.
                </p>
              </div>
              <div class="flex flex-col gap-space-xs">
                <h2 class="font-label-lg text-label-lg font-bold uppercase tracking-wider text-on-surface">Benefits</h2>
                <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">Engineered with dual
                  high-pressure swashplate dynamics delivering up to 98.4% volumetric efficiency across continuous
                  heavy-duty duty cycles. Features heat-treated spheroidal graphite iron casting with advanced
                  cavitation resistance, integrated internal charge relief dampening, and high-temp Viton™ seals
                  providing extended mean time between maintenance (MTBM) in abrasive mining and earthmoving conditions.
                </p>
              </div>
              <div class="flex flex-col gap-space-xs">
                <h2 class="font-label-lg text-label-lg font-bold uppercase tracking-wider text-on-surface">Detail Produk
                </h2>
                <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">High-performance 140 cc/rev
                  displacement pump unit featuring SAE 4-bolt standard mounting flange, dual-port high-flow suction
                  manifold, 14T involute spline drive shaft compliant with DIN 5480, and pre-calibrated proportional
                  load-sensing regulator. Rated for 350 Bar continuous operating pressure with a 420 Bar intermittent
                  peak limit at 1,800 RPM.</p>
              </div>
              <!-- Key Benefits & Value Propositions (Benefits & Isi) -->

              <!-- Technical Specs & Dimensional Metrics (Detail Produk, Volume, Weight) -->

              <!-- PRIMARY ACTION BUTTONS: Official WhatsApp Order + Spec Download -->
              <div class="flex flex-col gap-space-sm pt-space-xs">
                <!-- Main WhatsApp Callout Button -->
                <a class="w-full bg-[#25D366] hover:bg-[#20bd5a] text-white py-3.5 px-6 rounded-full font-label-lg text-label-lg flex items-center justify-center gap-3 shadow-md hover:shadow-lg transition-all transform active:scale-[0.99] font-bold"
                  href="https://wa.me/18008467987?text=Hello%20THORXup%20Machinery,%20I%20would%20like%20to%20order/inquire%20about%20the%20HP-4200%20Axial%20Piston%20Pump%20(TX-HYD-4200-AXP)"
                  rel="noopener noreferrer" target="_blank">
                  <!-- WhatsApp Icon SVG -->
                  <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                    <path
                      d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z">
                    </path>
                  </svg>
                  <span>Order Now via WhatsApp</span>
                </a>
                <!-- Supporting Action Row -->

                <!-- Guarantee Note -->
                <div
                  class="flex items-center justify-center gap-2 pt-1 text-on-surface-variant font-label-spec text-label-spec">

                  <span>Guaranteed 15-minute engineering reply on WhatsApp Business</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Section: Technical Compatibility & Verification Matrix -->

      <!-- Section: Related Products (Produk Lainnya) -->
      <section class="w-full py-space-2xl bg-white">
        <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin">
          <div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md mb-space-xl">
            <div>

              <h2 class="font-headline-lg text-headline-lg text-on-surface font-bold tracking-tight">Related Heavy
                Machinery &amp; Replacement Parts</h2>
              <p class="font-body-md text-body-md text-on-surface-variant mt-1">
                Complementary hydraulic units and powertrain assemblies frequently paired with the HP-4200 pump.
              </p>
            </div>
            <a class="inline-flex items-center gap-2 text-primary font-label-lg text-label-lg font-semibold hover:underline shrink-0"
              href="#">
              <span>View All 184 Components</span>
              <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
            </a>
          </div>
          <!-- 4 Product Cards Grid matching SCREEN_2 style -->
          <div class="grid grid-cols-2 lg:grid-cols-4 gap-gutter">
            <!-- Product Card 1: Heavy Excavator -->
            <div
              class="bg-surface-container-lowest rounded-md overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group">
              <div class="relative w-full h-52 bg-surface-container-high overflow-hidden">
                <img alt="THORX-X950 Heavy Excavator"
                  class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                  data-alt="Heavy crawler excavator THORX-X950 moving earth at an industrial open-pit quarry during dusk with safety beacons illuminated and heavy iron treads."
                  src="https://lh3.googleusercontent.com/aida-public/AB6AXuBcv-idXmUqwPt-8rTVMljZTmxgxWZ1aN8FaVwAWpbynWABMM8CXNh2nLugSbENflAhqHkRz1HenfNMmSH6NXGE8puSJB8TBxo_WOMM2G7qVpf6mNFaEUMTBjuBbToCT0wZwC6pZOjkUPI89X9Z4OcLVDvTtR2Su7Ss8Vo0rOYDKQIKqtElf2Q52SeOKwJMsDBfbD1KvmufIzjY9SMUj6sXrYV8OHwYXwTAqfFNYe_y">

              </div>
              <div class="p-space-md flex flex-col flex-1 justify-between gap-space-md">
                <div>
                  <span
                    class="text-primary font-label-spec text-label-spec font-bold uppercase tracking-wider block mb-1">HEAVY
                    EXCAVATORS</span>
                  <h3
                    class="font-headline-sm text-headline-sm font-bold text-on-surface group-hover:text-primary transition-colors line-clamp-2">
                    THORX-X950 Heavy Excavator
                  </h3>

                </div>
                <div class="pt-space-xs flex items-center justify-between">

                  <a class="inline-flex items-center gap-1 font-label-lg text-label-lg font-bold text-primary group-hover:translate-x-1 transition-transform"
                    href="#">
                    <span>View Details</span>
                    <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                  </a>
                </div>
              </div>
            </div>
            <!-- Product Card 2: Undercarriage Master Link -->
            <div
              class="bg-surface-container-lowest rounded-md overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group">
              <div class="relative w-full h-52 bg-surface-container-high overflow-hidden">
                <img alt="DuraTrack Master Link Assembly"
                  class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                  data-alt="Heavy forged steel track chains and master link undercarriage track assemblies hoisted on steel frame inside heavy machinery overhaul warehouse."
                  src="https://lh3.googleusercontent.com/aida-public/AB6AXuDtpA2XoqHJdA8J1s3LhDaxYoCq3vTka5SvC4g1SQg8oUuNh_CI52UEIUTzVzPP6g4dtqLn-IN-Jo7V0H3ZhZ46YWMhtx-MXRAdrgxyJnpteZHOfD7bj2bPjtMBbaySq-RkHlqrt4ZXzsu3d-JYmrhrFMVQe4kN27jOWHNnKY4BQrZfwO2IyKNiRh7eyuDzyzfi_VZRV-glplJfRrYq_2CsKb0IPXEZ8zYKX9CYePlA">

              </div>
              <div class="p-space-md flex flex-col flex-1 justify-between gap-space-md">
                <div>
                  <span
                    class="text-primary font-label-spec text-label-spec font-bold uppercase tracking-wider block mb-1">UNDERCARRIAGE
                    &amp; TRACKS</span>
                  <h3
                    class="font-headline-sm text-headline-sm font-bold text-on-surface group-hover:text-primary transition-colors line-clamp-2">
                    DuraTrack Master Link Assembly
                  </h3>

                </div>
                <div class="pt-space-xs flex items-center justify-between">

                  <a class="inline-flex items-center gap-1 font-label-lg text-label-lg font-bold text-primary group-hover:translate-x-1 transition-transform"
                    href="#">
                    <span>View Details</span>
                    <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                  </a>
                </div>
              </div>
            </div>
            <!-- Product Card 3: Monoblock Valve Block -->
            <div
              class="bg-surface-container-lowest rounded-md overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group">
              <div class="relative w-full h-52 bg-surface-container-high overflow-hidden">
                <img alt="ApexFlow Monoblock Valve Block"
                  class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                  data-alt="Monoblock hydraulic directional control valve block manifold machined from cast iron with multiple electronic proportional solenoid actuators."
                  src="https://lh3.googleusercontent.com/aida-public/AB6AXuC-feSgUNZOfUsjmir9rb5zpQ4Crq9zME6eLBJQqG2dDaLyzRslzxX2Owk92oBXFhxU6N5MKHrNxs_St93mU6YNxHEseaz0eMYcv18fUMneei41SKLGh85CjVngU1gO2V1SQSK2VEp8WI5iWz-GT34gfmp4QSw1I2eVhgYn4nCeG03cGrUoZzcaDV0fs1vmZpuF7IDhlr6EWzgkGVYnDBX3bo_g3qQw8RbvqIVP3W98">

              </div>
              <div class="p-space-md flex flex-col flex-1 justify-between gap-space-md">
                <div>
                  <span
                    class="text-primary font-label-spec text-label-spec font-bold uppercase tracking-wider block mb-1">HYDRAULIC
                    ASSEMBLIES</span>
                  <h3
                    class="font-headline-sm text-headline-sm font-bold text-on-surface group-hover:text-primary transition-colors line-clamp-2">
                    ApexFlow Monoblock Valve Block
                  </h3>

                </div>
                <div class="pt-space-xs flex items-center justify-between">

                  <a class="inline-flex items-center gap-1 font-label-lg text-label-lg font-bold text-primary group-hover:translate-x-1 transition-transform"
                    href="#">
                    <span>View Details</span>
                    <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                  </a>
                </div>
              </div>
            </div>
            <!-- Product Card 4: V8 TurboDiesel Engine Block -->
            <div
              class="bg-surface-container-lowest rounded-md overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group">
              <div class="relative w-full h-52 bg-surface-container-high overflow-hidden">
                <img alt="V8 TurboDiesel Heavy Block"
                  class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                  data-alt="Massive industrial V8 turbodiesel heavy powertrain block on an engine dyno stand in a clean engineering development facility."
                  src="https://lh3.googleusercontent.com/aida-public/AB6AXuCkMPMMfk_jVMss4O7JYTiNVVnCNHDoQSevk36hgPY8nQtJcYMldSyRcCHWx69t3_IieDhmPeAAdycpMBya_D5yktDTICx6ieAfUOV2Y99D_auABf4znbvJT3TIPqwvJsNkJvCBGd5QgcfT1a5bEsKefS_h98Iz9HC-uGZnIUHGj8mgiJ3lQsYCXxuFTQMUErKwW7uN6zt3lcUZ3ZFTNO8IaTaQpoHM77I91GkjIeIZ">

              </div>
              <div class="p-space-md flex flex-col flex-1 justify-between gap-space-md">
                <div>
                  <span
                    class="text-primary font-label-spec text-label-spec font-bold uppercase tracking-wider block mb-1">POWERTRAIN
                    &amp; ENGINES</span>
                  <h3
                    class="font-headline-sm text-headline-sm font-bold text-on-surface group-hover:text-primary transition-colors line-clamp-2">
                    V8 TurboDiesel Heavy Block
                  </h3>

                </div>
                <div class="pt-space-xs flex items-center justify-between">

                  <a class="inline-flex items-center gap-1 font-label-lg text-label-lg font-bold text-primary group-hover:translate-x-1 transition-transform"
                    href="#">
                    <span>View Details</span>
                    <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Section: Bottom Support Callout Banner (Matching SCREEN_2 Style) -->
      <section class="w-full py-space-xl bg-white">
        <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin">
          <div
            class="bg-surface-container-lowest p-space-xl rounded-md shadow-md flex flex-col md:flex-row items-center justify-between gap-space-lg relative overflow-hidden">
            <div class="flex flex-col gap-space-xs z-10 max-w-2xl">

              <h2 class="font-headline-md text-headline-md text-on-surface font-bold">
                Need Custom Hydraulic or OEM Fitment Verification?
              </h2>
              <p class="font-body-md text-body-md text-on-surface-variant">
                Our certified hydraulic engineers will verify your pump spline dimensions, rotation direction, and
                operating circuit pressures before dispatch.
              </p>
            </div>
            <div class="flex flex-wrap items-center gap-space-sm z-10 shrink-0">
              <a class="bg-primary hover:bg-primary-container text-on-primary py-3.5 px-7 rounded-full font-label-lg text-label-lg font-bold transition-all shadow-md hover:shadow-lg flex items-center gap-2"
                href="https://wa.me/18008467987" rel="noopener noreferrer" target="_blank">
                <span class="material-symbols-outlined text-[20px]">support_agent</span>
                <span>Contact Me</span>
              </a>
              <a class="bg-surface-container-high hover:bg-surface-container text-on-surface py-3.5 px-6 rounded-full font-label-lg text-label-lg font-semibold transition-all"
                href="#">
                Schedule Field Call
              </a>
            </div>
          </div>
        </div>
      </section>
@endsection