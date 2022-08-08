<script setup>
    import Priorities from './HomeCards/Priorities.vue'
    import Projects from './HomeCards/Projects.vue'
</script>

<template>
    <main class="flex flex-col shrink grow basis-0 relative" tabindex="-1 min-w-[920px]">
        <div class="flex shrink grow basis justify-center relative min-h-[1px]">
            <div class="w-full min-h-[1px] overflow-auto block will-change-transform">
                <div class="flex p-6 mb-10">
                    <h1 class="text-3xl-center basis-full text-white font-sans font-normal grow">Home</h1>
                    <h2 class="text-white mr-2">Search</h2>
                    <h2 class="text-white mr-2">+</h2>
                    <h2 class="text-white mr-2">Auth</h2>
                </div>


                <div class="items-center flex flex-col box-border py-0 px-[32px] w-full">
                    <div class="mb-10 grid justify-items-center">
                        <h1 class="text-white text-xl">Friday, August 5</h1>
                        <h1 class="text-white text-3xl font-normal">Good evening, Louie</h1>
                    </div>

                    <div class="grid mb-[12px] mt-[16px]">
                        <div class="justify-self-center row-start-1 col-start-1 block">
                            <div class="align-content-center rounded-[60px] bg-slate-600 mx-auto pr-[8px] inline-flex h-[48px]">
                                <div class="mx-[16px] my-0 pt-3 flex">
                                    <div class="font-normal text-xs h-[28px] leading-7 py-0 px-[8px] cursor-pointer shrink min-w-[1px] overflow-hidden inline-flex box-border justify-center content-center" tabindex="0">
                                        <span class="mw-[1px] overflow-hidden text-ellipsis whitespace-nowrap">My Week</span>
                                        <svg class="overflow-hidden ml-[4px] grow-0 basis-auto shrink-0 w-[12px]" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                            <path d="M3.5,8.9c0-0.4,0.1-0.7,0.4-1C4.5,7.3,5.4,7.2,6,7.8l5.8,5.2l6.1-5.2C18.5,7.3,19.5,7.3,20,8c0.6,0.6,0.5,1.5-0.1,2.1 l-7.1,6.1c-0.6,0.5-1.4,0.5-2,0L4,10.1C3.6,9.8,3.5,9.4,3.5,8.9z"></path>
                                        </svg>
                                    </div>

                                    <div class="border-r-[1px] h-6"></div>

                                    <div class="content-center flex">
                                        <div class="content-center flex justify-center w-[72px]">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full">
                        <div class="flex justify-center gap-4">
                            <Priorities></Priorities>
                            <Projects></Projects>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

</template>
