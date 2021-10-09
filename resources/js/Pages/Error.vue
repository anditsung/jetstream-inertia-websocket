<template>
    <div class="flex min-h-screen">
        <div class="flex w-full justify-center items-center">
            <div class="flex w-1/4 flex-col bg-white rounded-lg p-6 space-y-4">
                <div class="text-2xl">{{ title }}</div>
                <div>{{ description }}</div>
                <Link href="/" class="font-bold text-blue-400">
                    <div class="flex">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        <span class="pl-2">Back to Home</span>
                    </div>
                </Link>
            </div>
        </div>
    </div>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3'

    export default {
        components: {
            Link
        },

        props: {
            status: Number,
        },
        computed: {
            title() {
                return {
                    503: '503: Service Unavailable',
                    500: '500: Server Error',
                    404: '404: Page Not Found',
                    403: '403: Forbidden',
                }[this.status]
            },
            description() {
                return {
                    503: 'Sorry, we are doing some maintenance. Please check back soon.',
                    500: 'Whoops, something went wrong on our servers.',
                    404: 'Sorry, the page you are looking for could not be found.',
                    403: 'Sorry, you are forbidden from accessing this page.',
                }[this.status]
            },
        },
    }
</script>
