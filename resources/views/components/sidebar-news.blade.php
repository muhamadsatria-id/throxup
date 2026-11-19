<!-- Right Column: Sidebar (4 Columns, Sticky) -->
                        <aside class="lg:col-span-4 flex flex-col gap-space-lg">
                            <div class="sticky top-24 flex flex-col gap-space-lg">
                                <!-- 1. Search Bar News Widget -->
                                <div class="bg-surface-container-lowest p-space-lg rounded-md shadow-sm">
                                    <h3
                                        class="font-headline-sm text-headline-sm font-bold text-on-surface mb-space-sm flex items-center gap-2">

                                        Search News &amp; Insights
                                    </h3>
                                    <form class="relative flex items-center mt-space-xs"
                                        onsubmit="event.preventDefault();">
                                        <input
                                            class="w-full bg-surface-container-low text-on-surface placeholder:text-outline text-body-md font-body-md pl-10 pr-24 py-2.5 rounded-full focus:outline-none focus:ring-2 focus:ring-primary shadow-inner"
                                            placeholder="Search articles, specs, parts..." type="text">
                                        <span
                                            class="material-symbols-outlined text-outline absolute left-3.5 text-[20px] pointer-events-none" aria-hidden="true">search</span>
                                        <button
                                            class="absolute right-1 px-space-md py-1.5 rounded-full bg-primary text-on-primary font-label-md text-label-md font-semibold hover:bg-primary-container transition-colors shadow-sm"
                                            type="submit">
                                            Search
                                        </button>
                                    </form>

                                </div>
                                <!-- 2. Recent Posts Widget (Hanya List Judul) -->
                                <div class="bg-surface-container-lowest p-space-lg rounded-md shadow-sm">
                                    <div class="relative mb-space-md border-b-2 border-primary flex items-end">
                                        <div
                                            class="bg-primary text-white font-headline-sm text-headline-sm font-bold px-space-md py-2 rounded-t-DEFAULT inline-block leading-tight select-none">
                                            Recent Posts</div>
                                    </div>
                                    <ul class="flex flex-col gap-space-sm">
                                        <li class="group border-b border-surface-container pb-space-sm last:border-b-0">
                                            <a class="block" href="#">
                                                <span
                                                    class="font-body-md text-body-md font-semibold text-on-surface group-hover:text-primary transition-colors leading-snug">
                                                    THORXup Unveils Next-Gen Hydraulic Systems Reducing Fuel Consumption
                                                </span>
                                            </a>
                                        </li>
                                        <li class="group border-b border-surface-container pb-space-sm last:border-b-0">
                                            <a class="block" href="#">
                                                <span
                                                    class="font-body-md text-body-md font-semibold text-on-surface group-hover:text-primary transition-colors leading-snug">
                                                    Heavy Machinery Maintenance Guide: Undercarriage Lifespan
                                                </span>
                                            </a>
                                        </li>
                                        <li class="group border-b border-surface-container pb-space-sm last:border-b-0">
                                            <a class="block" href="#">
                                                <span
                                                    class="font-body-md text-body-md font-semibold text-on-surface group-hover:text-primary transition-colors leading-snug">
                                                    High-Torque TurboDiesel vs Electric Heavy Powertrains
                                                </span>
                                            </a>
                                        </li>
                                        <li class="group border-b border-surface-container pb-space-sm last:border-b-0">
                                            <a class="block" href="#">
                                                <span
                                                    class="font-body-md text-body-md font-semibold text-on-surface group-hover:text-primary transition-colors leading-snug">
                                                    Predictive Failure Diagnostics via CAN-Bus Integration
                                                </span>
                                            </a>
                                        </li>
                                        <li class="group pb-1">
                                            <a class="block" href="#">
                                                <span
                                                    class="font-body-md text-body-md font-semibold text-on-surface group-hover:text-primary transition-colors leading-snug">
                                                    Precision Metallurgical Alloys in Heavy Excavator Links
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- 3. Recent Comments Widget -->
                                <div class="bg-surface-container-lowest p-space-lg rounded-md shadow-sm">
                                    <div
                                        class="flex items-center justify-between mb-space-md pb-space-xs border-b border-surface-container">
                                        <h3
                                            class="font-headline-sm text-headline-sm font-bold text-on-surface flex items-center gap-2">

                                            Recent Comments
                                        </h3>
                                        <span
                                            class="font-label-spec text-label-spec text-secondary uppercase font-semibold">Community</span>
                                    </div>
                                    <div class="flex flex-col gap-space-md">
                                        <div class="p-space-sm bg-surface-container-low rounded-md">
                                            <div class="flex items-center gap-2 mb-1">
                                                <span
                                                    class="w-6 h-6 rounded-full bg-primary text-on-primary font-label-spec text-label-spec flex items-center justify-center font-bold">MC</span>
                                                <span
                                                    class="font-label-md text-label-md font-bold text-on-surface">Marcus
                                                    Chen</span>
                                                <span class="text-on-surface-variant text-xs">on</span>
                                                <span
                                                    class="font-label-spec text-label-spec text-primary truncate max-w-[120px]">Predictive
                                                    Failure</span>
                                            </div>
                                            <p class="font-body-sm text-body-sm text-on-surface-variant italic pl-8">
                                                "Great telemetry thresholds. The vibration harmonic frequency guide
                                                resolved our pump cavitation issues."
                                            </p>
                                        </div>
                                        <div class="p-space-sm bg-surface-container-low rounded-md">
                                            <div class="flex items-center gap-2 mb-1">
                                                <span
                                                    class="w-6 h-6 rounded-full bg-secondary text-on-secondary font-label-spec text-label-spec flex items-center justify-center font-bold">HV</span>
                                                <span
                                                    class="font-label-md text-label-md font-bold text-on-surface">Hendrik
                                                    V.</span>
                                                <span class="text-on-surface-variant text-xs">on</span>
                                                <span
                                                    class="font-label-spec text-label-spec text-primary truncate max-w-[120px]">Hydraulic
                                                    Systems</span>
                                            </div>
                                            <p class="font-body-sm text-body-sm text-on-surface-variant italic pl-8">
                                                "Will this drop-in proportional valve fit the 336D series boom cylinder
                                                manifold without machining?"
                                            </p>
                                        </div>
                                        <div class="p-space-sm bg-surface-container-low rounded-md">
                                            <div class="flex items-center gap-2 mb-1">
                                                <span
                                                    class="w-6 h-6 rounded-full bg-primary-container text-on-primary font-label-spec text-label-spec flex items-center justify-center font-bold">PQ</span>
                                                <span class="font-label-md text-label-md font-bold text-on-surface">PT
                                                    Quarry Tech</span>
                                                <span class="text-on-surface-variant text-xs">on</span>
                                                <span
                                                    class="font-label-spec text-label-spec text-primary truncate max-w-[120px]">Maintenance
                                                    Guide</span>
                                            </div>
                                            <p class="font-body-sm text-body-sm text-on-surface-variant italic pl-8">
                                                "Very helpful undercarriage wear chart. We calibrated our daily track
                                                slack to 45mm based on this."
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- 4. Archives Widget (Strictly List of Years) -->
                                <div class="bg-surface-container-lowest p-space-lg rounded-md shadow-sm">
                                    <div
                                        class="flex items-center justify-between mb-space-md pb-space-xs border-b border-surface-container">
                                        <h3
                                            class="font-headline-sm text-headline-sm font-bold text-on-surface flex items-center gap-2">
                                            <span
                                                class="material-symbols-outlined text-primary text-[20px]" aria-hidden="true">calendar_month</span>
                                            Archives
                                        </h3>
                                        <span
                                            class="font-label-spec text-label-spec text-secondary uppercase font-semibold">By
                                            Year</span>
                                    </div>
                                    <ul class="flex flex-col gap-2">
                                        <li>
                                            <a class="flex items-center justify-between px-space-md py-space-xs rounded-md hover:bg-surface-container transition-colors group"
                                                href="#">
                                                <span
                                                    class="font-body-md text-body-md font-semibold text-on-surface group-hover:text-primary flex items-center gap-2">
                                                    <span
                                                        class="material-symbols-outlined text-[16px] text-outline group-hover:text-primary" aria-hidden="true">folder_open</span>
                                                    2026
                                                </span>

                                            </a>
                                        </li>
                                        <li>
                                            <a class="flex items-center justify-between px-space-md py-space-xs rounded-md hover:bg-surface-container transition-colors group"
                                                href="#">
                                                <span
                                                    class="font-body-md text-body-md font-semibold text-on-surface group-hover:text-primary flex items-center gap-2">
                                                    <span
                                                        class="material-symbols-outlined text-[16px] text-outline group-hover:text-primary" aria-hidden="true">folder_open</span>
                                                    2025
                                                </span>

                                            </a>
                                        </li>
                                        <li>
                                            <a class="flex items-center justify-between px-space-md py-space-xs rounded-md hover:bg-surface-container transition-colors group"
                                                href="#">
                                                <span
                                                    class="font-body-md text-body-md font-semibold text-on-surface group-hover:text-primary flex items-center gap-2">
                                                    <span
                                                        class="material-symbols-outlined text-[16px] text-outline group-hover:text-primary" aria-hidden="true">folder_open</span>
                                                    2024
                                                </span>

                                            </a>
                                        </li>
                                        <li>
                                            <a class="flex items-center justify-between px-space-md py-space-xs rounded-md hover:bg-surface-container transition-colors group"
                                                href="#">
                                                <span
                                                    class="font-body-md text-body-md font-semibold text-on-surface group-hover:text-primary flex items-center gap-2">
                                                    <span
                                                        class="material-symbols-outlined text-[16px] text-outline group-hover:text-primary" aria-hidden="true">folder_open</span>
                                                    2023
                                                </span>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- 5. Newsletter / Engineering Bulletin Box -->
                                <div
                                    class="bg-primary text-on-primary p-space-lg rounded-md shadow-md relative overflow-hidden">
                                    <div
                                        class="absolute -right-6 -bottom-6 w-32 h-32 bg-primary-container rounded-full opacity-50 blur-xl pointer-events-none">
                                    </div>
                                    <div class="relative z-10">
                                        <div
                                            class="inline-flex items-center gap-1 text-on-primary-container font-label-spec text-label-spec uppercase tracking-wider mb-2">
                                            <span class="material-symbols-outlined text-[16px]" aria-hidden="true">mail</span>
                                            Direct Telemetry
                                        </div>
                                        <h4 class="font-headline-sm text-headline-sm font-bold text-on-primary">
                                            Industrial Bulletin</h4>
                                        <p
                                            class="font-body-sm text-body-sm text-on-primary-container mt-1 mb-space-md leading-relaxed">
                                            Receive monthly metallurgical test reports and hydraulic service advisories
                                            directly in your inbox.
                                        </p>
                                        <form class="flex flex-col gap-2"
                                            onsubmit="event.preventDefault(); alert('Subscribed to Engineering Bulletin.');">
                                            <input
                                                class="w-full bg-surface-container-lowest text-on-surface px- space-sm px-space-md py-2.5 rounded-full text-body-sm font-body-sm focus:outline-none shadow-sm"
                                                placeholder="fleet.engineer@company.com" required="" type="email">
                                            <button
                                                class="w-full py-2.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-lg text-label-lg font-bold hover:bg-surface transition-colors shadow-sm text-center"
                                                type="submit">
                                                Subscribe Bulletin
                                            </button>
                                        </form>
                                        <span
                                            class="block text-[11px] text-on-primary-container/80 mt-2 text-center">Zero
                                            marketing spam. Only audited technical digests.</span>
                                    </div>
                                </div>
                            </div>
                        </aside>