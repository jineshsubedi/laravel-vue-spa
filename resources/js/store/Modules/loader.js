export const loader = {
    namespace: true,
    state: {
        loading: false,
    },
    actions: {
        start() {
            this.$Progress.start()
        },
        set(num) {
            this.$Progress.set(num)
        },
        increase(num) {
            this.$Progress.increase(num)
        },
        decrease(num) {
            this.$Progress.decrease(num)
        },
        finish() {
            this.$Progress.finish()
        },
        fail() {
            this.$Progress.fail()
        }
    }
}