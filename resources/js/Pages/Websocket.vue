<template>
    <div class="flex flex-col min-h-screen bg-gray-200">
        <div class="flex justify-end p-4 space-x-2">
            <a class="font-bold px-4 py-2 bg-blue-300 rounded-lg hover:bg-blue-400" href="/">Home</a>
            <a class="font-bold px-4 py-2 bg-blue-300 rounded-lg hover:bg-blue-400" href="/vanilla-websocket">Vanilla Websocket</a>
        </div>
        <div class="flex flex-col flex-grow justify-center items-center">
            <div class="flex justify-center p-4" v-show="quote">
                <span class="text-5xl -mt-5">"</span>
                <div class="flex flex-col space-x-2">
                    <div class="italic">{{ quote }}</div>
                    <div class="h-full text-right font-bold">{{ by }}</div>
                </div>
                <span class="text-5xl -mt-5">"</span>
            </div>
            <button class="px-4 py-2 bg-blue-300 rounded-lg hover:bg-blue-400" @click="getInspiring">Get Inspiring using websocket</button>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            quote: "",
            by: "",
        }),

        created() {
            Echo.channel('websocket-inspiring-event')
                .listen('.inspiring-update', (event) => {
                    this.quote = event.quote
                    this.by = event.by
                })
        },

        methods: {
            getInspiring() {
                axios.get('/get-websocket-inspiring')
            },
        },
    }
</script>
