export interface LoginForm {
    email?: `${string}@${string}.${string}` | null,
    password?: string | null,
}