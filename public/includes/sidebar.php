<aside class="sidebar flex">
    <nav class="navbar">
        <div class="hambergur">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="sidebar__links flex-column">
            <!------------------ Common links ------------------>

            <li class="<?php echo ($currentPage == 'Dashboard') ? 'active' : ''; ?>">
                <a href="dashboard.php" class="flex">
                    <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.9443 11.906H18.0519C20.3378 11.906 22.1467 13.9972 22.1467 16.5002C22.1467 17.9566 21.4392 19.4126 20.4726 20.728C19.5029 22.0475 18.2514 23.2538 17.1169 24.2157C16.6162 24.6413 16.0025 24.8525 15.3889 24.8525C14.7755 24.8525 14.1617 24.6413 13.6621 24.217C13.6621 24.2169 13.662 24.2169 13.662 24.2168L13.8238 24.0263C11.569 22.1142 8.88234 19.2572 8.88234 16.5015C8.88234 14.1069 10.6072 12.1573 12.7272 12.1573C13.799 12.1573 14.7182 12.5122 15.3889 13.1259L17.9443 11.906ZM17.9443 11.906L17.942 11.9085C16.9445 11.9299 16.0659 12.2467 15.3888 12.796L17.9443 11.906ZM24.6481 3.50516V5.97803L18.888 1.87062L18.8879 1.87058C16.7911 0.376475 14.0767 0.376475 11.9799 1.87058L11.9799 1.87062L3.69995 7.77448C3.69993 7.77449 3.69992 7.7745 3.6999 7.77451C1.9987 8.98698 0.987671 10.999 0.987671 13.1583V24.7512C0.987671 28.3217 3.74036 31.25 7.15277 31.25H23.715C27.1274 31.25 29.8801 28.3217 29.8801 24.7512V13.1583C29.8801 11.1527 28.9993 9.28171 27.5141 8.05388V3.50516C27.5141 2.68907 26.8861 2.00539 26.0811 2.00539C25.276 2.00539 24.6481 2.68907 24.6481 3.50516ZM5.31265 10.2551L5.31279 10.255L13.5939 4.3511L13.5942 4.35093C14.1554 3.94985 14.7955 3.75141 15.4339 3.75141C16.0723 3.75141 16.7124 3.94985 17.2737 4.35093L17.2739 4.35111L25.5562 10.255L25.7013 10.0514L25.5562 10.255C26.4658 10.9034 27.0141 11.987 27.0141 13.1583V24.7512C27.0141 26.6933 25.5209 28.2505 23.715 28.2505H7.15277C5.34688 28.2505 3.85371 26.6933 3.85371 24.7512V13.1583C3.85371 11.987 4.40194 10.9035 5.31265 10.2551ZM15.3882 21.8202C14.1838 20.7904 13.2121 19.764 12.54 18.8396C11.8459 17.8851 11.4984 17.0761 11.4984 16.5002C11.4984 15.5677 12.0989 14.9056 12.7272 14.9056C13.0431 14.9056 13.3527 14.9617 13.5772 15.117C13.785 15.2608 13.9559 15.5144 13.9559 16.0016C13.9559 16.8178 14.5853 17.5013 15.3889 17.5013C16.1926 17.5013 16.822 16.8178 16.822 16.0016C16.822 15.5137 16.9929 15.2602 17.2006 15.1166C17.4251 14.9615 17.7346 14.9056 18.0507 14.9056C18.6791 14.9056 19.2795 15.5666 19.2795 16.5002C19.2795 17.0761 18.932 17.8851 18.2379 18.8394C17.5655 19.764 16.5933 20.7906 15.3882 21.8202Z" fill="white" stroke="white" stroke-width="0.5" />
                    </svg>
                    Dashboard
                </a>
            </li>
            <!------------------  Links Based on donor ------------------>

            <?php if ($userType == 'donor') : ?>
                <li class="<?php echo ($currentPage == 'Manage Profile') ? 'active' : ''; ?>">
                    <a href="Manage-profile.php" class="flex">
                        <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 15C20.1421 15 23.5 11.6421 23.5 7.5C23.5 3.35786 20.1421 0 16 0C11.8579 0 8.5 3.35786 8.5 7.5C8.5 11.6421 11.8579 15 16 15Z" fill="white" />
                            <path d="M16 17.5C9.78965 17.5069 4.75691 22.5397 4.75 28.75C4.75 29.4404 5.30963 30 5.99998 30H26C26.6903 30 27.2499 29.4404 27.2499 28.75C27.2431 22.5397 22.2104 17.5069 16 17.5Z" fill="white" />
                        </svg>
                        Manage Profile
                    </a>
                </li>
                <li class="<?php echo ($currentPage == 'Donate Blood') ? 'active' : ''; ?>">
                    <a href="Donate-blood.php" class="flex">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_9_379)">
                                <path d="M20 3.4375C20 6.14125 16.475 9.50125 14.7188 10.91C14.4439 11.1303 14.1022 11.2504 13.75 11.2504C13.3978 11.2504 13.0561 11.1303 12.7812 10.91C11.025 9.5 7.5 6.14125 7.5 3.4375C7.46058 2.56777 7.76723 1.71784 8.35287 1.07363C8.93851 0.429426 9.75546 0.0433981 10.625 0C11.4945 0.0433981 12.3115 0.429426 12.8971 1.07363C13.4828 1.71784 13.7894 2.56777 13.75 3.4375C13.7106 2.56777 14.0172 1.71784 14.6029 1.07363C15.1885 0.429426 16.0055 0.0433981 16.875 0C17.7445 0.0433981 18.5615 0.429426 19.1471 1.07363C19.7328 1.71784 20.0394 2.56777 20 3.4375ZM29.1725 15.4375L19.5475 25.9488C18.3757 27.2265 16.9508 28.2465 15.3635 28.944C13.7763 29.6414 12.0613 30.0011 10.3275 30H5C3.67392 30 2.40215 29.4732 1.46447 28.5355C0.526784 27.5979 0 26.3261 0 25V18.75C0 17.4239 0.526784 16.1521 1.46447 15.2145C2.40215 14.2768 3.67392 13.75 5 13.75H14.7337C15.1469 13.7508 15.5547 13.8439 15.9273 14.0226C16.2999 14.2013 16.6278 14.461 16.8871 14.7827C17.1464 15.1044 17.3305 15.48 17.4259 15.882C17.5214 16.284 17.5257 16.7023 17.4388 17.1063C17.3034 17.6713 16.9986 18.1815 16.5652 18.5684C16.1318 18.9554 15.5905 19.2006 15.0138 19.2712L9.81 20C9.48202 20.047 9.18614 20.2224 8.98738 20.4875C8.78862 20.7526 8.70324 21.0857 8.75 21.4137C8.79675 21.742 8.97196 22.0381 9.23709 22.2372C9.50222 22.4362 9.83554 22.5217 10.1637 22.475L15.4788 21.725C16.7306 21.5406 17.8749 20.9138 18.7044 19.9583C19.5338 19.0027 19.9935 17.7816 20 16.5163C19.9939 16.2487 19.9667 15.982 19.9188 15.7188L24.3462 11.0475C24.9301 10.4153 25.7404 10.0398 26.6002 10.003C27.4599 9.96628 28.2993 10.2712 28.935 10.8512C29.5675 11.4309 29.9468 12.2359 29.9912 13.0926C30.0357 13.9494 29.7416 14.7893 29.1725 15.4313V15.4375Z" fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_9_379">
                                    <rect width="30" height="30" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        Donate Blood
                    </a>
                </li>
                <li class="<?php echo ($currentPage == 'Donation History') ? 'active' : ''; ?>">
                    <a href="Donation-history.php" class="flex">
                        <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_9_362)">
                                <path d="M15.8886 -7.62939e-06C12.2194 0.0107787 8.68078 1.36223 5.93855 3.79999L4.2723 2.13374C4.09749 1.95898 3.87478 1.83997 3.63234 1.79176C3.3899 1.74355 3.13861 1.76831 2.91023 1.8629C2.68186 1.95748 2.48665 2.11766 2.3493 2.32317C2.21194 2.52868 2.1386 2.7703 2.13855 3.01749V8.74999C2.13855 9.08151 2.27025 9.39946 2.50467 9.63388C2.73909 9.8683 3.05703 9.99999 3.38855 9.99999H9.12105C9.36824 9.99994 9.60986 9.9266 9.81538 9.78925C10.0209 9.65189 10.1811 9.45669 10.2756 9.22831C10.3702 8.99994 10.395 8.74864 10.3468 8.5062C10.2986 8.26376 10.1796 8.04106 10.0048 7.86624L8.58605 6.44749C10.2417 5.03317 12.2722 4.12971 14.4312 3.84673C16.5902 3.56374 18.7849 3.9134 20.7491 4.85328C22.7133 5.79316 24.3625 7.28286 25.4967 9.14165C26.6308 11.0004 27.2012 13.1484 27.1386 15.325C27.0581 18.1373 25.9269 20.8174 23.9679 22.8368C22.0088 24.8562 19.3643 26.0683 16.5557 26.2339C13.7471 26.3996 10.9784 25.5069 8.79548 23.7319C6.61262 21.9569 5.17408 19.4284 4.76355 16.645C4.70493 16.1924 4.48434 15.7764 4.1426 15.474C3.80087 15.1716 3.36114 15.0032 2.9048 15C2.64001 14.9966 2.37753 15.0497 2.13491 15.1558C1.89229 15.2619 1.6751 15.4186 1.49786 15.6154C1.32062 15.8121 1.18741 16.0445 1.10713 16.2968C1.02684 16.5492 1.00133 16.8157 1.0323 17.0787C1.55257 20.7612 3.42029 24.1198 6.27405 26.5046C9.12781 28.8894 12.7647 30.1308 16.4811 29.9887C20.2407 29.8076 23.7981 28.2327 26.4597 25.5712C29.1213 22.9096 30.6962 19.3522 30.8773 15.5925C30.9548 13.5749 30.6246 11.5624 29.9064 9.67532C29.1883 7.78826 28.097 6.06541 26.6977 4.6098C25.2985 3.15418 23.62 1.9957 21.7628 1.20364C19.9055 0.41158 17.9076 0.00220273 15.8886 -7.62939e-06Z" fill="white" />
                                <path d="M15.2637 8.75C14.7664 8.75 14.2895 8.94754 13.9378 9.29917C13.5862 9.65081 13.3887 10.1277 13.3887 10.625V15.9913C13.3888 16.6542 13.6523 17.29 14.1212 17.7587L16.3624 20C16.7161 20.3415 17.1897 20.5305 17.6813 20.5263C18.1729 20.522 18.6432 20.3248 18.9908 19.9772C19.3385 19.6295 19.5357 19.1592 19.5399 18.6676C19.5442 18.176 19.3552 17.7024 19.0137 17.3487L17.1387 15.4737V10.625C17.1387 10.1277 16.9411 9.65081 16.5895 9.29917C16.2379 8.94754 15.761 8.75 15.2637 8.75Z" fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_9_362">
                                    <rect width="30" height="30" fill="white" transform="translate(0.888672)" />
                                </clipPath>
                            </defs>
                        </svg>
                        Donation History
                    </a>
                </li>
                <li class="<?php echo ($currentPage == 'Request Status') ? 'active' : ''; ?>">
                    <a href="Request-status.php" class="flex">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.7863 2.5C19.27 1.045 17.88 0 16.25 0H13.75C12.12 0 10.73 1.045 10.2137 2.5H3.75V26.25C3.75 28.3175 5.4325 30 7.5 30H22.5C24.5675 30 26.25 28.3175 26.25 26.25V2.5H19.7863ZM23.75 26.25C23.75 26.9387 23.19 27.5 22.5 27.5H7.5C6.81 27.5 6.25 26.9387 6.25 26.25V5H12.5V3.75C12.5 3.06125 13.06 2.5 13.75 2.5H16.25C16.94 2.5 17.5 3.06125 17.5 3.75V5H23.75V26.25ZM9.3025 14.3888L7.515 12.6962L9.23375 10.8813L10.8337 12.3975L14.0188 9.21375L15.7862 10.9812L12.4213 14.3463C11.9825 14.7863 11.4113 15.0063 10.84 15.0063C10.29 15.0063 9.7375 14.8012 9.3025 14.3888ZM15.7875 18.48L12.4225 21.845C11.9837 22.285 11.4125 22.505 10.8413 22.505C10.2913 22.505 9.73875 22.3 9.30375 21.8875L7.51625 20.195L9.235 18.38L10.835 19.8962L14.02 16.7125L15.7875 18.48ZM15 15L17.5525 12.5H21.25V15H15ZM17.5525 20H21.25V22.5H15L17.5525 20Z" fill="white" />
                        </svg>
                        Request Status
                    </a>
                </li>
                <li class="<?php echo ($currentPage == 'Campaign') ? 'active' : ''; ?>">
                    <a href="Campaign.php" class="flex">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_9_374)">
                                <path d="M18.75 10H12.5V6.25H18.75V10ZM8.125 20C7.09 20 6.25 20.84 6.25 21.875C6.25 22.91 7.09 23.75 8.125 23.75C9.16 23.75 10 22.91 10 21.875C10 20.84 9.16 20 8.125 20ZM8.125 6.25C7.09 6.25 6.25 7.09 6.25 8.125C6.25 9.16 7.09 10 8.125 10C9.16 10 10 9.16 10 8.125C10 7.09 9.16 6.25 8.125 6.25ZM8.125 13.125C7.09 13.125 6.25 13.965 6.25 15C6.25 16.035 7.09 16.875 8.125 16.875C9.16 16.875 10 16.035 10 15C10 13.965 9.16 13.125 8.125 13.125ZM26.25 16.25C24.1788 16.25 22.5 18.1125 22.5 20.4087C22.5 18.1112 20.8212 16.25 18.75 16.25C16.6788 16.25 15 18.1125 15 20.4087C15 24.765 22.5 30 22.5 30C22.5 30 30 24.765 30 20.4087C30 18.1112 28.3212 16.25 26.25 16.25ZM12.5 16.875H13.4738C14.5813 15.0037 16.525 13.75 18.75 13.75V13.125H12.5V16.875ZM14.8763 26.25H3.75V4.375C3.75 4.03125 4.03 3.75 4.375 3.75H20.625C20.97 3.75 21.25 4.03125 21.25 4.375V14.3288C21.6925 14.5363 22.1175 14.7787 22.5 15.085C23.2262 14.5025 24.0788 14.1 25 13.8988V4.375C25 1.9625 23.0375 0 20.625 0H4.375C1.9625 0 0 1.9625 0 4.375V30H18.4563C17.2987 28.9937 15.98 27.7025 14.8763 26.25Z" fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_9_374">
                                    <rect width="30" height="30" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        Campaign
                    </a>
                </li>
                <!------------------  Links Based on admin ------------------>

            <?php elseif ($userType == 'admin') : ?>
                <li class="<?php echo ($currentPage == 'Manage Inventary') ? 'active' : ''; ?>">
                    <a href="Manage-inventary.php" class="flex">
                        <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_65_82)">
                                <g clip-path="url(#clip1_65_82)">
                                    <path d="M21.4338 18.4038L11.6687 28.1688C10.4887 29.3488 8.92 29.9988 7.25 29.9988C5.58 29.9988 4.01125 29.3488 2.83125 28.1688C1.65125 26.9888 1 25.4188 1 23.7488C1 22.0788 1.65125 20.5101 2.83125 19.3288L12.5963 9.56382L21.435 18.4026L21.4338 18.4038ZM30.6338 11.6163L19.3837 0.366318C18.895 -0.122432 18.105 -0.122432 17.6163 0.366318C17.1275 0.855068 17.1275 1.64507 17.6163 2.13382L18.8225 3.34007L14.3638 7.79882L23.2025 16.6376L27.6613 12.1788L28.8675 13.3851C29.1112 13.6288 29.4312 13.7513 29.7512 13.7513C30.0712 13.7513 30.3913 13.6288 30.635 13.3851C31.1238 12.8963 31.1238 12.1063 30.635 11.6176L30.6338 11.6163ZM29.535 28.5351C30.48 27.5913 31 26.3351 31 25.0001C31 23.6651 30.48 22.4088 29.615 21.5513L28.0312 19.6376L27.9425 19.5413L27.385 18.8738C26.6775 18.0263 25.3787 18.0151 24.6562 18.8513L24.06 19.5413L23.97 19.6388L22.4663 21.4651C21.5212 22.4088 21.0012 23.6651 21.0012 25.0001C21.0012 26.3351 21.5212 27.5913 22.4663 28.5351C23.4113 29.4801 24.6663 30.0001 26.0012 30.0001C27.3362 30.0001 28.5913 29.4801 29.5363 28.5351H29.535Z" fill="white" />
                                </g>
                            </g>
                            <defs>
                                <clipPath id="clip0_65_82">
                                    <rect width="30" height="30" fill="white" transform="translate(0.888672)" />
                                </clipPath>
                                <clipPath id="clip1_65_82">
                                    <rect width="30" height="30" fill="white" transform="translate(1)" />
                                </clipPath>
                            </defs>
                        </svg>
                        Manage Inventary
                    </a>
                </li>
                <li class="<?php echo ($currentPage == 'Blood Requests') ? 'active' : ''; ?>">
                    <a href="Blood-requests.php" class="flex">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.7863 2.5C19.27 1.045 17.88 0 16.25 0H13.75C12.12 0 10.73 1.045 10.2137 2.5H3.75V26.25C3.75 28.3175 5.4325 30 7.5 30H22.5C24.5675 30 26.25 28.3175 26.25 26.25V2.5H19.7863ZM23.75 26.25C23.75 26.9387 23.19 27.5 22.5 27.5H7.5C6.81 27.5 6.25 26.9387 6.25 26.25V5H12.5V3.75C12.5 3.06125 13.06 2.5 13.75 2.5H16.25C16.94 2.5 17.5 3.06125 17.5 3.75V5H23.75V26.25ZM9.3025 14.3888L7.515 12.6962L9.23375 10.8813L10.8337 12.3975L14.0188 9.21375L15.7862 10.9812L12.4213 14.3463C11.9825 14.7863 11.4113 15.0063 10.84 15.0063C10.29 15.0063 9.7375 14.8012 9.3025 14.3888ZM15.7875 18.48L12.4225 21.845C11.9837 22.285 11.4125 22.505 10.8413 22.505C10.2913 22.505 9.73875 22.3 9.30375 21.8875L7.51625 20.195L9.235 18.38L10.835 19.8962L14.02 16.7125L15.7875 18.48ZM15 15L17.5525 12.5H21.25V15H15ZM17.5525 20H21.25V22.5H15L17.5525 20Z" fill="white" />
                        </svg>

                        Blood Requests
                    </a>
                </li>
                <li class="<?php echo ($currentPage == 'Manage Campaign') ? 'active' : ''; ?>">
                    <a href="Manage-campaign.php" class="flex">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_9_374)">
                                <path d="M18.75 10H12.5V6.25H18.75V10ZM8.125 20C7.09 20 6.25 20.84 6.25 21.875C6.25 22.91 7.09 23.75 8.125 23.75C9.16 23.75 10 22.91 10 21.875C10 20.84 9.16 20 8.125 20ZM8.125 6.25C7.09 6.25 6.25 7.09 6.25 8.125C6.25 9.16 7.09 10 8.125 10C9.16 10 10 9.16 10 8.125C10 7.09 9.16 6.25 8.125 6.25ZM8.125 13.125C7.09 13.125 6.25 13.965 6.25 15C6.25 16.035 7.09 16.875 8.125 16.875C9.16 16.875 10 16.035 10 15C10 13.965 9.16 13.125 8.125 13.125ZM26.25 16.25C24.1788 16.25 22.5 18.1125 22.5 20.4087C22.5 18.1112 20.8212 16.25 18.75 16.25C16.6788 16.25 15 18.1125 15 20.4087C15 24.765 22.5 30 22.5 30C22.5 30 30 24.765 30 20.4087C30 18.1112 28.3212 16.25 26.25 16.25ZM12.5 16.875H13.4738C14.5813 15.0037 16.525 13.75 18.75 13.75V13.125H12.5V16.875ZM14.8763 26.25H3.75V4.375C3.75 4.03125 4.03 3.75 4.375 3.75H20.625C20.97 3.75 21.25 4.03125 21.25 4.375V14.3288C21.6925 14.5363 22.1175 14.7787 22.5 15.085C23.2262 14.5025 24.0788 14.1 25 13.8988V4.375C25 1.9625 23.0375 0 20.625 0H4.375C1.9625 0 0 1.9625 0 4.375V30H18.4563C17.2987 28.9937 15.98 27.7025 14.8763 26.25Z" fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_9_374">
                                    <rect width="30" height="30" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        Manage Campaign
                    </a>
                </li>
                <!------------------  Links Based on recipient ------------------>

            <?php elseif ($userType == 'recipient') : ?>
                <li class="<?php echo ($currentPage == 'Manage Profile') ? 'active' : ''; ?>">
                    <a href="Manage-profile.php" class="flex">
                        <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 15C20.1421 15 23.5 11.6421 23.5 7.5C23.5 3.35786 20.1421 0 16 0C11.8579 0 8.5 3.35786 8.5 7.5C8.5 11.6421 11.8579 15 16 15Z" fill="white" />
                            <path d="M16 17.5C9.78965 17.5069 4.75691 22.5397 4.75 28.75C4.75 29.4404 5.30963 30 5.99998 30H26C26.6903 30 27.2499 29.4404 27.2499 28.75C27.2431 22.5397 22.2104 17.5069 16 17.5Z" fill="white" />
                        </svg>
                        Manage Profile
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</aside>