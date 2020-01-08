<?php $email_options = wl_get_email_options(); ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td style="text-align: center; color: <?= $email_options['text_color'] ?>; font-size: 12px; padding: 15px 0 20px;">
                            <p id="copyright" style="margin: 0; font-size: 12px; margin-bottom: 15px;">Copyright &copy; <?= date('Y'); ?> <?= $email_options['company_name'] ?>. All rights reserved.</p>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </center>
    </body>
</html>
