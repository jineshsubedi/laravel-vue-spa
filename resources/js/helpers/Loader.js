class Loader {
    start() {
        this.$Progress.start()
    }
    set(num) {
        this.$Progress.set(num)
    }
    increase(num) {
        this.$Progress.increase(num)
    }
    decrease(num) {
        this.$Progress.decrease(num)
    }
    finish() {
        this.$Progress.finish()
    }
    fail() {
        this.$Progress.fail()
    }
}

export default new Loader;