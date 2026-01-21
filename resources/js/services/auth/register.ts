export interface RegisterForm {
    name?: string | null,
    slug?: string | null,
    email?: `${string}@${string}.${string}` | null,
    password?: string | null,
    password_confirmation?: string | null
}

export async function register(formData : RegisterForm) {

}