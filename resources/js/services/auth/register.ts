export interface RegisterForm {
    name?: string,
    email?: `${string}@${string}.${string}` | null,
    password?: string,
    password_confirmation?: string
}

export async function register(formData : RegisterForm) {

}